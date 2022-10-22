<?php 

namespace Mateodioev\Bots\Telegram\Interfaces;

use stdClass;

interface TelegramInterface
{
  public function request(string $method, array $datas=[]): stdClass;

  public function download(string $file_path, string $destination, int $timeout = 30): bool;

  public function getApiLink(): string;

  public function getToken(): string;
}