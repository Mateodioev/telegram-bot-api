<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents an inline button that switches the current user to inline mode in a chosen chat, with an optional default inline query.
 *
 * @see https://core.telegram.org/bots/api#switchinlinequerychosenchat
 */
class SwitchInlineQueryChosenChat extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'query'               => FieldType::optional('string'),
            'allow_user_chats'    => FieldType::optional('boolean'),
            'allow_bot_chats'     => FieldType::optional('boolean'),
            'allow_group_chats'   => FieldType::optional('boolean'),
            'allow_channel_chats' => FieldType::optional('boolean'),
        ];
    }
}
