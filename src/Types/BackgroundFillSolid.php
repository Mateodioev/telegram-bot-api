<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * The background is filled using the selected color.
 *
 * @property string $type Type of the background fill, always "solid"
 * @property int $color The color of the background fill in the RGB24 format
 *
 * @method string type()
 * @method int color()
 *
 * @method static setType(string $type)
 * @method static setColor(int $color)
 *
 * @see https://core.telegram.org/bots/api#backgroundfillsolid
 */
class BackgroundFillSolid extends BackgroundFill
{
    protected function boot(): void
    {
        if ($this->fields !== null) {
            // Already booted
            return;
        }
        $this->fields = [
            'type'  => FieldType::single('string'),
            'color' => FieldType::single('integer'),
        ];
    }

    public static function default(): static
    {
        return (new static())
            ->setType('solid');
    }
}
