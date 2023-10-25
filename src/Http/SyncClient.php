<?php

namespace Mateodioev\Bots\Telegram\Http;

use Mateodioev\Request\Request as BlockingRequest;
use Mateodioev\Utils\Exceptions\RequestException;

class SyncClient implements Request
{
    protected BlockingRequest $request;

    /**
     * Create new blocking request
     */
    public function new(string $url, mixed $payload, Methods $method = Methods::POST): static
    {
        match ($method) {
            Methods::POST => $this->request = BlockingRequest::POST($url, $payload),
            default => $this->request = BlockingRequest::GET($url)
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
            return new Response($this->request->run()->getBody());
        } catch (RequestException $e) {
            throw new HttpException($e->getMessage(), $e->getCode(), $e);
        }
    }

    public function isAsync(): bool
    {
        return false;
    }
}
