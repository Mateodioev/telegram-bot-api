<?php

namespace Mateodioev\Bots\Telegram\Http;

use function json_decode;

class Response
{
    public function __construct(protected string $body) {}

    /**
     * Get request body
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * Decode json body
     */
    public function toArray(): array
    {
        return json_decode($this->body, true);
    }

    /**
     * Decode json body
     */
    public function toStdClass(): \stdClass
    {
        return json_decode($this->body);
    }
}
