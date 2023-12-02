<?php

namespace Mateodioev\Bots\Telegram\Http;

use Mateodioev\Bots\Telegram\Types\File;

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
     * Download file from telegram server
     * @param string $path Remote File path
     * @param string $destination Local file path to save
     */
    public function download(string $path, string $destination): bool;

    /**
     * Return true if is async client
     */
    public function isAsync(): bool;
}
