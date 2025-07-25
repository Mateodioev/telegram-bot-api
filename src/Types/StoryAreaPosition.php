<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Describes the position of a clickable area within a story.
 *
 * @property double $x_percentage The abscissa of the area's center, as a percentage of the media width
 * @property double $y_percentage The ordinate of the area's center, as a percentage of the media height
 * @property double $width_percentage The width of the area's rectangle, as a percentage of the media width
 * @property double $height_percentage The height of the area's rectangle, as a percentage of the media height
 * @property double $rotation_angle The clockwise rotation angle of the rectangle, in degrees; 0-360
 * @property double $corner_radius_percentage The radius of the rectangle corner rounding, as a percentage of the media width
 *
 * @method double xPercentage()
 * @method double yPercentage()
 * @method double widthPercentage()
 * @method double heightPercentage()
 * @method double rotationAngle()
 * @method double cornerRadiusPercentage()
 *
 * @method static setXPercentage(double $xPercentage)
 * @method static setYPercentage(double $yPercentage)
 * @method static setWidthPercentage(double $widthPercentage)
 * @method static setHeightPercentage(double $heightPercentage)
 * @method static setRotationAngle(double $rotationAngle)
 * @method static setCornerRadiusPercentage(double $cornerRadiusPercentage)
 *
 * @see https://core.telegram.org/bots/api#storyareaposition
 */
class StoryAreaPosition extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'x_percentage'             => FieldType::single('double'),
            'y_percentage'             => FieldType::single('double'),
            'width_percentage'         => FieldType::single('double'),
            'height_percentage'        => FieldType::single('double'),
            'rotation_angle'           => FieldType::single('double'),
            'corner_radius_percentage' => FieldType::single('double'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
