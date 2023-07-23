<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * Represents the [scope](https://core.telegram.org/bots/api#botcommandscope) of bot commands, covering a specific chat.
 * 
 * @property string         $type    Scope type, must be chat
 * @property integer|string $chat_id Unique identifier for the target chat or username of the target supergroup (in the format `@supergroupusername`)
 * 
 * @method string         type()
 * @method integer|string chatId()
 * 
 * @method static setType(string $type)
 * @method static setChatId(integer|string $chatId)
 * 
 * @see https://core.telegram.org/bots/api#botcommandscopechat
 */
class BotCommandScopeChat extends BotCommandScope
{
    protected array $fields = [
        'type'    => 'string',
        'chat_id' => 'integer|string',
    ];
}
