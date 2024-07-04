<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;
use Mateodioev\Bots\Telegram\Config\FieldsStorage;

/**
 * The background is a gradient fill.
 *
 * @property string $type Type of the background fill, always "gradient"
 * @property int $top_color Top color of the gradient in the RGB24 format
 * @property int $bottom_color Bottom color of the gradient in the RGB24 format
 * @property int $rotation_angle Clockwise rotation angle of the background fill in degrees; 0-359
 *
 * @method string type()
 * @method int topColor()
 * @method int bottomColor()
 * @method int rotationAngle()
 *
 * @method static setType(string $type)
 * @method static setTopColor(int $topColor)
 * @method static setBottomColor(int $bottomColor)
 * @method static setRotationAngle(int $rotationAngle)
 *
 * @see https://core.telegram.org/bots/api#backgroundfillgradient
 */
class BackgroundFillGradient extends BackgroundFill
{
    protected function boot(): void
    {
        $this->fields = [
            'type'           => FieldType::single('string'),
            'top_color'      => FieldType::single('integer'),
            'bottom_color'   => FieldType::single('integer'),
            'rotation_angle' => FieldType::single('integer'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }

    public static function default(): static
    {
        return (new static())
            ->setType('gradient');
    }
}
