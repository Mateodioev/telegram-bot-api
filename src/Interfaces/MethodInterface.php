<?php 

namespace Mateodioev\Bots\Telegram\Interfaces;

interface MethodInterface
{
  public function getMethod(): string;

  public function getReturn(): array;

  public function getParams(): array;
}
