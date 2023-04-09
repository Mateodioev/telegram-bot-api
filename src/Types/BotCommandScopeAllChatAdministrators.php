<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * Represents the [scope](https://core.telegram.org/bots/api#botcommandscope) of bot commands, covering all group and supergroup chat administrators.
 * 
 * @property string $type Scope type, must be all_chat_administrators
 * 
 * @method string type()
 * 
 * @method static setType(string $type)
 * 
 * @see https://core.telegram.org/bots/api#botcommandscopeallchatadministrators
 */
class BotCommandScopeAllChatAdministrators extends baseType
{
    protected array $fields = [
        'type' => 'string',
    ];
}
