<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * This object describes the background of a gift.
 *
 * @property int $center_color Center color of the background in RGB format
 * @property int $edge_color Edge color of the background in RGB format
 * @property int $text_color Text color of the background in RGB format
 *
 * @method int centerColor()
 * @method int edgeColor()
 * @method int textColor()
 *
 * @method static setCenterColor(int $centerColor)
 * @method static setEdgeColor(int $edgeColor)
 * @method static setTextColor(int $textColor)
 *
 * @see https://core.telegram.org/bots/api#giftbackground
 */
class GiftBackground extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'center_color' => FieldType::single('integer'),
            'edge_color'   => FieldType::single('integer'),
            'text_color'   => FieldType::single('integer'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
