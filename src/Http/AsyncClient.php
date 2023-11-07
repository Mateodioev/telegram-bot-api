<?php

namespace Mateodioev\Bots\Telegram\Http;

use Stringable;
use stdClass;
use CURLFile;
use Throwable;

use Amp\Http\Client\{
    HttpClient,
    HttpClientBuilder,
    HttpContent,
    Request as AsyncRequest,
    Form
};

class AsyncClient implements Request
{
    protected HttpClient $client;

    private AsyncRequest $request;

    public function __construct()
    {
        $this->client = HttpClientBuilder::buildDefault();
    }

    /**
     * @throws HttpException
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

        if ($payload !== null && !empty($payload)) {
            $this->request->setBody($this->createBody($payload));
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

    public function run(): Response
    {
        try {
            $response = $this->client->request($this->request);
            return new Response($response->getBody()->buffer());
        } catch (Throwable $e) {
            throw new HttpException($e->getMessage(), $e->getCode(), $e);
        }
    }

    public function isAsync(): bool
    {
        return true;
    }
}
