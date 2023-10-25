<?php

namespace Mateodioev\Bots\Telegram\Interfaces;

use stdClass;

interface TelegramInterface
{
    public function request(MethodInterface $method): TypesInterface|stdClass|array;

    public function download(string $file_path, string $destination, int $timeout = 30): bool;

    public function getApiLink(): string;

    public function getToken(): string;
}
