<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * Represents the [scope](https://core.telegram.org/bots/api#botcommandscope) of bot commands, covering all private chats.
 * 
 * @property string $type Scope type, must be all_private_chats
 * 
 * @method string type()
 * 
 * @method static setType(string $type)
 * 
 * @see https://core.telegram.org/bots/api#botcommandscopeallprivatechats
 */
class BotCommandScopeAllPrivateChats extends baseType
{
    protected array $fields = [
        'type' => 'string',
    ];
}
