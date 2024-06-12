<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * The background is a freeform gradient that rotates after every message in the chat.
 *
 * @property string $type Type of the background fill, always "freeform_gradient"
 * @property int[] $colors A list of the 3 or 4 base colors that are used to generate the freeform gradient in the RGB24 format
 *
 * @method string type()
 * @method int[] colors()
 *
 * @method static setType(string $type)
 * @method static setColors(int[] $colors)
 *
 * @see https://core.telegram.org/bots/api#backgroundfillfreeformgradient
 */
class BackgroundFillFreeformGradient extends BackgroundFill
{
    protected function boot(): void
    {
        $this->fields = [
            'type'   => FieldType::single('string'),
            'colors' => FieldType::multiple('integer'),
        ];
    }

    public static function default(): static
    {
        return (new static())
            ->setType('freeform_gradient');
    }
}
