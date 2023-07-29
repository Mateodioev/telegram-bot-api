<?php

namespace Mateodioev\Bots\Telegram\Config;

class strUtils
{
    private const EMOJIFY_OFFSET = 127397;

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
            ['<', '>', '≤', '≥', '&'],
            ['&lt;', '&gt;', '&le;', '&ge;', '&amp;'],
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
        return str_replace([
            '\\', '-', '#', '*', '+', '`', '.', '[', ']', '(', ')', '!', '&', '<', '>', '_', '{', '}', ],
            ['\\\\', '\-', '\#', '\*', '\+', '\`', '\.', '\[', '\]', '\(', '\)', '\!', '\&', '\<', '\>', '\_', '\{', '\}',],
            $str
        );
    }
}
