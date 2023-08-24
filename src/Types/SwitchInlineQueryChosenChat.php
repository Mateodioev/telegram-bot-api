<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents an inline button that switches the current user to inline mode in a chosen chat, with an optional default inline query.
 *
 * @property ?string $query Optional. The default inline query to be inserted in the input field. If left empty, only the bot's username will be inserted
 * @property ?bool $allow_user_chats Optional. True, if private chats with users can be chosen
 * @property ?bool $allow_bot_chats Optional. True, if private chats with bots can be chosen
 * @property ?bool $allow_group_chats Optional. True, if group and supergroup chats can be chosen
 * @property ?bool $allow_channel_chats Optional. True, if channel chats can be chosen
 *
 * @method ?string query()
 * @method ?bool allowUserChats()
 * @method ?bool allowBotChats()
 * @method ?bool allowGroupChats()
 * @method ?bool allowChannelChats()
 *
 * @method static setQuery(?string $query)
 * @method static setAllowUserChats(?bool $allowUserChats)
 * @method static setAllowBotChats(?bool $allowBotChats)
 * @method static setAllowGroupChats(?bool $allowGroupChats)
 * @method static setAllowChannelChats(?bool $allowChannelChats)
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
