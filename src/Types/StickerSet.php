<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents a sticker set.
 *
 * @see https://core.telegram.org/bots/api#stickerset
 */
class StickerSet extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'name'         => FieldType::single('string'),
            'title'        => FieldType::single('string'),
            'sticker_type' => FieldType::single('string'),
            'is_animated'  => FieldType::single('boolean'),
            'is_video'     => FieldType::single('boolean'),
            'stickers'     => FieldType::multiple(Sticker::class),
            'thumbnail'    => FieldType::optional(PhotoSize::class),
        ];
    }
}
