<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * Represents the [scope](https://core.telegram.org/bots/api#botcommandscope) of bot commands, covering all administrators of a specific group or supergroup chat.
 * 
 * @property string         $type    Scope type, must be chat_administrators
 * @property integer|string $chat_id Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 * 
 * @method string         type()
 * @method integer|string chatId()
 * 
 * @method static setType(string $type)
 * @method static setChatId(integer|string $chatId)
 * 
 * @see https://core.telegram.org/bots/api#botcommandscopechatadministrators
 */
class BotCommandScopeChatAdministrators extends BotCommandScope
{
    protected array $fields = [
        'type' => 'string',
        'chat_id' => 'integer|string',
    ];
}
