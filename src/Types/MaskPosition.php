<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object describes the position on faces where a mask should be placed by default.
 *
 * @property string $point The part of the face relative to which the mask should be placed. One of "forehead", "eyes", "mouth", or "chin".
 * @property double $x_shift Shift by X-axis measured in widths of the mask scaled to the face size, from left to right. For example, choosing -1.0 will place mask just to the left of the default mask position.
 * @property double $y_shift Shift by Y-axis measured in heights of the mask scaled to the face size, from top to bottom. For example, 1.0 will place the mask just below the default mask position.
 * @property double $scale Mask scaling coefficient. For example, 2.0 means double size.
 *
 * @method string point()
 * @method double xShift()
 * @method double yShift()
 * @method double scale()
 *
 * @method static setPoint(string $point)
 * @method static setXShift(double $xShift)
 * @method static setYShift(double $yShift)
 * @method static setScale(double $scale)
 *
 * @see https://core.telegram.org/bots/api#maskposition
 */
class MaskPosition extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'point'   => FieldType::single('string'),
            'x_shift' => FieldType::single('double'),
            'y_shift' => FieldType::single('double'),
            'scale'   => FieldType::single('double'),
        ];
    }
}
