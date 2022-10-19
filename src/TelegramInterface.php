<?php 

namespace Mateodioev\Bots\Telegram;

use Mateodioev\Utils\fakeStdClass;

interface TelegramInterface
{
  public function request(string $method, array $datas=[]): fakeStdClass;

  public function download(string $file_path, string $destination, int $timeout = 30): bool;

  public function getApiLink(): string;

  public function getToken(): string;
}