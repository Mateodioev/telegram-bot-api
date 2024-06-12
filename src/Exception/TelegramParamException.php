<?php

namespace Mateodioev\Bots\Telegram\Exception;

use Mateodioev\Utils\Exceptions\ExceptionInterface;

final class TelegramParamException extends TelegramException implements ExceptionInterface
{
    public static function missingField(string $class, string $fieldName)
    {
        return new self("Missing \"$fieldName\" field in $class");
    }

    public static function invalidType(string $class, string $type)
    {
        return new self("Invalid type: \"$type\" in $class");
    }
}
