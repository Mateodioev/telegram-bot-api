<?php 

namespace Mateodioev\Bots\Telegram\Config;

class Types
{
  public static bool $returnNullParams = true;
  public static bool $throwOnFail = true;

  public static function setReturnNullParams(bool $return = false)
  {
    self::$returnNullParams = $return;
  }

  public static function setThrowExceptionOnFail(bool $throw = false)
  {
    self::$throwOnFail = $throw;
  }
}
