<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents an inline button that switches the current user to inline mode in a chosen chat, with an optional default inline query.
 *
 * @property string|null $query Optional. The default inline query to be inserted in the input field. If left empty, only the bot's username will be inserted
 * @property bool|null $allow_user_chats Optional. True, if private chats with users can be chosen
 * @property bool|null $allow_bot_chats Optional. True, if private chats with bots can be chosen
 * @property bool|null $allow_group_chats Optional. True, if group and supergroup chats can be chosen
 * @property bool|null $allow_channel_chats Optional. True, if channel chats can be chosen
 *
 * @method string|null query()
 * @method bool|null allowUserChats()
 * @method bool|null allowBotChats()
 * @method bool|null allowGroupChats()
 * @method bool|null allowChannelChats()
 *
 * @method static setQuery(string|null $query)
 * @method static setAllowUserChats(bool|null $allowUserChats)
 * @method static setAllowBotChats(bool|null $allowBotChats)
 * @method static setAllowGroupChats(bool|null $allowGroupChats)
 * @method static setAllowChannelChats(bool|null $allowChannelChats)
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
