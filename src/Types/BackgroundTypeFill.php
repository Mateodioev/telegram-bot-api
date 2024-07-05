<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * The background is automatically filled based on the selected colors.
 *
 * @property string $type Type of the background, always "fill"
 * @property BackgroundFill $fill The background fill
 * @property int $dark_theme_dimming Dimming of the background in dark themes, as a percentage; 0-100
 *
 * @method string type()
 * @method BackgroundFill fill()
 * @method int darkThemeDimming()
 *
 * @method static setType(string $type)
 * @method static setFill(BackgroundFill $fill)
 * @method static setDarkThemeDimming(int $darkThemeDimming)
 *
 * @see https://core.telegram.org/bots/api#backgroundtypefill
 */
class BackgroundTypeFill extends BackgroundType
{
    protected function boot(): void
    {
        $this->fields = [
            'type'               => FieldType::single('string'),
            'fill'               => FieldType::single(BackgroundFill::class),
            'dark_theme_dimming' => FieldType::single('integer'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }

    public static function default(): static
    {
        return (new static())
            ->setType('fill');
    }
}
