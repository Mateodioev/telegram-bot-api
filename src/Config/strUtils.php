<?php

namespace Mateodioev\Bots\Telegram\Config;

use function strtolower;
use function preg_replace;
use function str_replace;
use function ucwords;
use function lcfirst;

class strUtils
{
    public static function toSnakeCase(string $value): string
    {
        return strtolower(preg_replace('/(?<=[a-z])([A-Z])/', '_$1', $value));
    }

    public static function toPascalCase(string $value): string
    {
        return str_replace('_', '', ucwords($value, '_'));
    }

    public static function toCamelCase(string $value): string
    {
        // Convert first letter to lowercase
        return lcfirst(self::toPascalCase($value));
    }

    public static function scapeTags(string $str, ParseMode $mode): string
    {
        return $mode === ParseMode::HTML
            ? self::scapeHtmlTags($str)
            : self::scapeMarkdownTags($str);
    }

    /**
     * Scape "<", ">", "&", "≤", "≥" symbols
     *
     * @see https://core.telegram.org/bots/api#formatting-options
     */
    public static function scapeHtmlTags(string $str): string
    {
        return str_replace(
            ['&', '<', '>', '≤', '≥'],
            ['&amp;', '&lt;', '&gt;', '&le;', '&ge;'],
            $str
        );
    }

    /**
     * Replace all markdown tags with \TAG
     *
     * @see https://core.telegram.org/bots/api#formatting-options
     */
    public static function scapeMarkdownTags(string $str): string
    {
        return str_replace(
            ['\\', '-', '#', '*', '+', '`', '.', '[', ']', '(', ')', '!', '&', '<', '>', '_', '{', '}'],
            ['\\\\', '\-', '\#', '\*', '\+', '\`', '\.', '\[', '\]', '\(', '\)', '\!', '\&', '\<', '\>', '\_', '\{', '\}'],
            $str
        );
    }
}
