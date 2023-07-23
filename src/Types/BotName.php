<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * This object represents the bot's name.
 * 
 * @property string $name The bot's name
 * 
 * @method string name()
 * 
 * @method static setName(string $name)
 * 
 * @see https://core.telegram.org/bots/api#botname
 */
class BotName extends baseType
{
    protected array $fields = [
        'name' => 'string',
    ];
}
