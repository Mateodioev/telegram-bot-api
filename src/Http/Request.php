<?php

namespace Mateodioev\Bots\Telegram\Http;

/**
 * HTTP request interface
 */
interface Request
{
    /**
     * Create new request
     */
    public function new(string $url, mixed $payload = null, Methods $method = Methods::POST): static;

    /**
     * Set request timeout
     */
    public function setTimeout(int $timeout): static;

    /**
     * Run request and get result
     * @throws HttpException
     */
    public function run(): Response;

    /**
     * Return true if is async client
     */
    public function isAsync(): bool;
}
