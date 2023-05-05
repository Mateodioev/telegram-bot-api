<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * This object represents an inline button that switches the current user to inline mode in a chosen chat, with an optional default inline query.
 * 
 * @property string   $query               Optional. The default inline query to be inserted in the input field. If left empty, only the bot's username will be inserted
 * @property ?boolean $allow_user_chats    Optional. True, if private chats with users can be chosen
 * @property ?boolean $allow_bot_chats     Optional. True, if private chats with bots can be chosen
 * @property ?boolean $allow_group_chats   Optional. True, if group and supergroup chats can be chosen
 * @property ?boolean $allow_channel_chats Optional. True, if channel chats can be chosen
 * 
 * @method string   query()
 * @method ?boolean allowUserChats()
 * @method ?boolean allowBotChats()
 * @method ?boolean allowGroupChats()
 * @method ?boolean allowChannelChats()
 * 
 * @method static setQuery(string $query)
 * @method static setAllowUserChats(boolean $allowUserChats)
 * @method static setAllowBotChats(boolean $allowBotChats)
 * @method static setAllowGroupChats(boolean $allowGroupChats)
 * @method static setAllowChannelChats(boolean $allowChannelChats)
 * 
 * @see https://core.telegram.org/bots/api#switchinlinequerychosenchat
 */
class SwitchInlineQueryChosenChat extends baseType
{
    protected array $fields = [
        'query'             => 'string',
        'allow_user_chats'  => 'boolean',
        'allow_bot_chats'   => 'boolean',
        'allow_group_chats' => 'boolean',
        'allow_channel_chats' => 'boolean',
    ];
}
