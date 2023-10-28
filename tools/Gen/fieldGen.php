<?php

namespace Tools\Gen;

use function in_array;
use function strtolower;

trait fieldGen
{
    private static function isScalar(string $name): bool
    {
        $scalars = ["String", "Boolean", "Integer", "Float"];

        return in_array($name, $scalars);
    }

    public static function genType(string $type): string
    {
        if (self::isScalar($type)) {
            return $type == 'Float' ? 'double' : strtolower($type);
        } else {
            return "Mateodioev\Bots\Telegram\Types\\$type";
        }
    }
}
