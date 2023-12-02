<?php

namespace Mateodioev\Bots\Telegram\Http;

use Amp\File\{File, FilesystemException};
use Amp\Http\Client\{
    HttpClient,
    HttpClientBuilder,
    HttpContent,
    Request as AsyncRequest,
    Form
};
use Amp\ByteStream\{BufferException, Payload, StreamException};

use Stringable;
use stdClass;
use CURLFile;
use Throwable;

use function Amp\File\openFile;

class AsyncClient implements Request
{
    protected HttpClient $client;

    private AsyncRequest $request;

    public function __construct()
    {
        $this->client = HttpClientBuilder::buildDefault();
    }

    /**
     * @throws HttpException|\Amp\Http\Client\HttpException
     */
    private function createBody(mixed $payload): HttpContent|string
    {
        if (is_string($payload) || $payload instanceof Stringable) {
            return (string) $payload;
        } elseif ($payload instanceof stdClass) {
            return json_encode($payload);
        } elseif (is_array($payload)) {
            $body = new Form();

            foreach ($payload as $key => $value) {
                if ($value instanceof CURLFile) {
                    $body->addFile($key, $value->getFilename(), $value->getMimeType());
                } elseif (is_array($value)) {
                    $body->addField($key, json_encode($value), 'application/json');
                } else {
                    $body->addField($key, (string) $value);
                }
            }

            return $body;
        }

        throw new HttpException('Unknown payload type');
    }

    /**
     * Create non-blocking request
     */
    public function new(string $url, mixed $payload = null, Methods $method = Methods::POST): static
    {
        $this->request = new AsyncRequest($url, $method->value());

        if (!empty($payload)) {
            try {
                $this->request->setBody($this->createBody($payload));
            } catch (\Amp\Http\Client\HttpException $e) {
                throw new HttpException($e->getMessage(), $e->getCode(), $e);
            }
        }

        return $this;
    }

    public function setTimeout(int $timeout): static
    {
        // i'm not sure
        $this->request->setInactivityTimeout($timeout);
        $this->request->setTransferTimeout($timeout);
        return $this;
    }

    private function executeRequest(): \Amp\Http\Client\Response
    {
        try {
            return $this->client->request($this->request);
        } catch (Throwable $e) {
            throw new HttpException($e->getMessage(), $e->getCode(), $e);
        }
    }

    public function run(): Response
    {
        try {
            return new Response($this->executeRequest()->getBody()->buffer());
        } catch (BufferException|StreamException $e) {
            throw new HttpException($e->getMessage(), $e->getCode(), $e);
        }
    }

    public function isAsync(): bool
    {
        return true;
    }

    public function download(string $path, string $destination): bool
    {
        $this->request->setUri(
            $this->request
                ->getUri()
                ->withPath($path)
        );

        $response = $this->executeRequest();
        try {
            $file = openFile($destination, 'w');
        } catch (FilesystemException $e) {
            throw new HttpException('File ' . $destination . ' not writable', previous: $e);
        }

        return $this->saveResponse(
            body: $response->getBody(),
            destination: $file
        );
    }

    private function saveResponse(Payload $body, File $destination): bool
    {
        try {
            while (null !== $chunk = $body->read()) {
                $destination->write($chunk);
            }
        } catch (StreamException) {
            return false;
        }

        $destination->close();
        return true;
    }
}
