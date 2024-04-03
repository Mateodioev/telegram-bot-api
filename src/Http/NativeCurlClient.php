<?php

namespace Mateodioev\Bots\Telegram\Http;

use Mateodioev\Request\Clients\Curl as BlockingRequest;
use Mateodioev\Request\Methods as RequestMethod;
use Mateodioev\Utils\Exceptions\RequestException;

/**
 * PHP blocking Native curl client
 */
class NativeCurlClient implements Request
{
    protected BlockingRequest $request;

    /**
     * Create new blocking request
     */
    public function new(string $url, mixed $payload = null, Methods $method = Methods::POST): static
    {
        $method = $method->toRequestMethod();
        match ($method) {
            RequestMethod::POST => $this->request = BlockingRequest::POST($url, $payload),
            default => $this->request             = BlockingRequest::GET($url)
        };

        return $this;
    }

    /**
     * Set request timeout
     */
    public function setTimeout(int $timeout): static
    {
        $this->request->addOpt(CURLOPT_TIMEOUT, $timeout);
        return $this;
    }

    /**
     * Run request and get result
     * @throws HttpException
     */
    public function run(): Response
    {
        try {
            return new Response($this->request->run()->body());
        } catch (RequestException $e) {
            throw new HttpException($e->getMessage(), $e->getCode(), $e);
        }
    }

    public function isAsync(): bool
    {
        return false;
    }

    public function download(string $path, string $destination): bool
    {
        $file = fopen($destination, 'w');
        $this->request->addOpt(CURLOPT_FILE, $file);
        try {
            $this->request->setMethod(RequestMethod::GET)->run($path);
            fclose($file);
            return true;
        } catch (HttpException) {
            return false;
        }
    }
}
