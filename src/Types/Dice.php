<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents an animated emoji that displays a random value.
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
