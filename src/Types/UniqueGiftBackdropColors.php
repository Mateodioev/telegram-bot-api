<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * This object describes the colors of the backdrop of a unique gift.
 *
 * @property int $center_color The color in the center of the backdrop in RGB format
 * @property int $edge_color The color on the edges of the backdrop in RGB format
 * @property int $symbol_color The color to be applied to the symbol in RGB format
 * @property int $text_color The color for the text on the backdrop in RGB format
 *
 * @method int centerColor()
 * @method int edgeColor()
 * @method int symbolColor()
 * @method int textColor()
 *
 * @method static setCenterColor(int $centerColor)
 * @method static setEdgeColor(int $edgeColor)
 * @method static setSymbolColor(int $symbolColor)
 * @method static setTextColor(int $textColor)
 *
 * @see https://core.telegram.org/bots/api#uniquegiftbackdropcolors
 */
class UniqueGiftBackdropColors extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'center_color' => FieldType::single('integer'),
            'edge_color'   => FieldType::single('integer'),
            'symbol_color' => FieldType::single('integer'),
            'text_color'   => FieldType::single('integer'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
