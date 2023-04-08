<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * This object represents an animated emoji that displays a random value.
 * 
 * @property string  $emoji Emoji on which the dice throw animation is based
 * @property integer $value Value of the dice, 1-6 for “🎲”, “🎯” and “🎳” base emoji, 1-5 for “🏀” and “⚽” base emoji, 1-64 for “🎰” base emoji
 * 
 * @method string  emoji()
 * @method integer value()
 * 
 * @method static setEmoji(string $emoji)
 * @method static setValue(integer $value)
 * 
 * @see https://core.telegram.org/bots/api#dice
 */
class Dice extends baseType
{
    protected array $fields = [
        'emoji' => 'string',
        'value' => 'integer',
    ];
}
