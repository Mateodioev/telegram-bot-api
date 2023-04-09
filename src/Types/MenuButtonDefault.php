<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * Describes that no specific value for the menu button was set.
 * 
 * @property string $type Type of the button, must be default
 * 
 * @method string type()
 * 
 * @method static setType(string $type)
 * 
 * @see https://core.telegram.org/bots/api#menubuttondefault
 */
class MenuButtonDefault extends MenuButton
{
    protected array $fields = [
        'type' => 'string',
    ];
}
