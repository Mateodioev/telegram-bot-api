<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * Represents the default [scope](https://core.telegram.org/bots/api#botcommandscope) of bot commands. Default commands are used if no commands with a [narrower scope](https://core.telegram.org/bots/api#determining-list-of-commands) are specified for the user.
 * 
 * @property string $type Scope type, must be default
 * 
 * @method string type()
 * 
 * @method static setType(string $type)
 * 
 * @see https://core.telegram.org/bots/api#botcommandscopedefault
 */
class BotCommandScopeDefault extends BotCommandScope
{
    protected array $fields = [
        'type' => 'string',
    ];
}
