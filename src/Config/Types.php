<?php

namespace Mateodioev\Bots\Telegram\Config;

class Types
{
    public static bool $returnNullParams = true;
    public static bool $throwOnFail = true;

    public static function setReturnNullParams(bool $return = false): bool
    {
        $oldValue = self::$returnNullParams;
        self::$returnNullParams = $return;
        return $oldValue;
    }

    public static function disableReturnNullParams(): bool
    {
        return self::setReturnNullParams(false);
    }

    public static function enableReturnNullParams(): bool
    {
        return self::setReturnNullParams(true);
    }

    public static function setThrowExceptionOnFail(bool $throw = false): bool
    {
        $old = self::$throwOnFail;
        self::$throwOnFail = $throw;
        return $old;
    }

    public static function disableThrowExceptionOnFail(): bool
    {
        return self::setThrowExceptionOnFail(false);
    }

    public static function enableThrowExceptionOnFail(): bool
    {
        return self::setThrowExceptionOnFail(true);
    }
}
