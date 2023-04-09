<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * This object represents the bot's description
 * 
 * @property string $description The bot's description
 * 
 * @method string description()
 * 
 * @method static setDescription(string $description)
 * 
 * @see https://core.telegram.org/bots/api#botdescription
 */
class BotDescription extends baseType
{
    protected array $fields = [
        'description' => 'string',
    ];
}
