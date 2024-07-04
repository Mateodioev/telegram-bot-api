<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;
use Mateodioev\Bots\Telegram\Config\FieldsStorage;

/**
 * This object represents a sticker set.
 *
 * @property string $name Sticker set name
 * @property string $title Sticker set title
 * @property string $sticker_type Type of stickers in the set, currently one of "regular", "mask", "custom_emoji"
 * @property Sticker[] $stickers List of all set stickers
 * @property PhotoSize|null $thumbnail Optional. Sticker set thumbnail in the .WEBP, .TGS, or .WEBM format
 *
 * @method string name()
 * @method string title()
 * @method string stickerType()
 * @method Sticker[] stickers()
 * @method PhotoSize|null thumbnail()
 *
 * @method static setName(string $name)
 * @method static setTitle(string $title)
 * @method static setStickerType(string $stickerType)
 * @method static setStickers(Sticker[] $stickers)
 * @method static setThumbnail(PhotoSize|null $thumbnail)
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
            'stickers'     => FieldType::multiple(Sticker::class),
            'thumbnail'    => FieldType::optional(PhotoSize::class),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
