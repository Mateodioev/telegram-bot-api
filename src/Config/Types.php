<?php 

namespace Mateodioev\Bots\Telegram\Config;

class Types
{
  public static bool $returnNullParams = true;

  public static function setReturnNullParams(bool $return = false)
  {
    self::$returnNullParams = $return;
  }
}
