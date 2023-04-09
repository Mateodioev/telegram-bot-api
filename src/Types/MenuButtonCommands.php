<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * Represents a menu button, which opens the bot's list of commands.
 * 
 * @property string $type Type of the button, must be commands
 * 
 * @method string type()
 * 
 * @method static setType(string $type)
 * 
 * @see https://core.telegram.org/bots/api#menubuttoncommands
 */
class MenuButtonCommands extends MenuButton
{
    protected array $fields = [
        'type' => 'string',
    ];
}
