<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents an animated emoji that displays a random value.
 *
 * @property string $emoji Emoji on which the dice throw animation is based
 * @property int $value Value of the dice, 1-6 for "🎲", "🎯" and "🎳" base emoji, 1-5 for "🏀" and "⚽" base emoji, 1-64 for "🎰" base emoji
 *
 * @method string emoji()
 * @method int value()
 *
 * @method static setEmoji(string $emoji)
 * @method static setValue(int $value)
 *
 * @see https://core.telegram.org/bots/api#dice
 */
class Dice extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'emoji' => FieldType::single('string'),
            'value' => FieldType::single('integer'),
        ];
    }
}
