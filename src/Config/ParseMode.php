<?php

namespace Mateodioev\Bots\Telegram\Config;

enum ParseMode: string
{
    case HTML = 'html';
    case MARKDOWN = 'markdown';

    public function scapeTags(string $str): string
    {
        return strUtils::scapeTags($str, $this);
    }
}
