<?php

namespace Mateodioev\Bots\Telegram\Interfaces;

use Mateodioev\Bots\Telegram\Types\File;
use stdClass;

interface TelegramInterface
{
    public function request(MethodInterface $method): TypesInterface|stdClass|array;

    /**
     * Download telegram file
     * @param string $filePath  File to download
     * @param string $destination File to save
     */
    public function download(string $filePath, string $destination): bool;

    /**
     * Download telegram file
     */
    public function downloadFile(File $file, string $destination): bool;

    public function getApiLink(): string;

    public function getToken(): string;
}
