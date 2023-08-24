<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object describes a sticker to be added to a sticker set.
 *
 * @see https://core.telegram.org/bots/api#inputsticker
 */
class InputSticker extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'sticker'       => FieldType::mixed(),
            'emoji_list'    => FieldType::multiple('string'),
            'mask_position' => FieldType::optional(MaskPosition::class),
            'keywords'      => new FieldType('string', allowArrays: true, allowNull: true, subTypes: []),
        ];
    }
}
