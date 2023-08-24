<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object describes the position on faces where a mask should be placed by default.
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
