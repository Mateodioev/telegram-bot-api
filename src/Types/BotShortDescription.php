<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * This object represents the bot's short description.
 * 
 * @property string $short_description The bot's short description
 * 
 * @method string shortDescription()
 * 
 * @method static setShortDescription(string $shortDescription)
 * 
 * @see https://core.telegram.org/bots/api#botshortdescription
 */
class BotShortDescription extends baseType
{
    protected array $fields = [
        'short_description' => 'string',
    ];
}
