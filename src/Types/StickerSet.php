<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents a sticker set.
 *
 * @property string $name Sticker set name
 * @property string $title Sticker set title
 * @property string $sticker_type Type of stickers in the set, currently one of "regular", "mask", "custom_emoji"
 * @property bool $is_animated True, if the sticker set contains animated stickers
 * @property bool $is_video True, if the sticker set contains video stickers
 * @property Sticker[] $stickers List of all set stickers
 * @property ?PhotoSize $thumbnail Optional. Sticker set thumbnail in the .WEBP, .TGS, or .WEBM format
 *
 * @method string name()
 * @method string title()
 * @method string stickerType()
 * @method bool isAnimated()
 * @method bool isVideo()
 * @method Sticker[] stickers()
 * @method ?PhotoSize thumbnail()
 *
 * @method static setName(string $name)
 * @method static setTitle(string $title)
 * @method static setStickerType(string $stickerType)
 * @method static setIsAnimated(bool $isAnimated)
 * @method static setIsVideo(bool $isVideo)
 * @method static setStickers(Sticker[] $stickers)
 * @method static setThumbnail(?PhotoSize $thumbnail)
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
