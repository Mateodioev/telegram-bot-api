<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * This object represents a sticker set.
 * 
 * @property string     $name         Sticker set name
 * @property string     $title        Sticker set title
 * @property string     $sticker_type Type of stickers in the set, currently one of “regular”, “mask”, “custom_emoji”
 * @property boolean    $is_animated  True, if the sticker set contains [animated stickers](https://telegram.org/blog/animated-stickers)
 * @property boolean    $is_video     True, if the sticker set contains [video stickers](https://telegram.org/blog/video-stickers-better-reactions)
 * @property Sticker[]  $stickers     List of all set stickers
 * @property ?PhotoSize $thumbnail    Optional. Sticker set thumbnail in the .WEBP, .TGS, or .WEBM format
 * 
 * @method string     name()
 * @method string     title()
 * @method string     stickerType()
 * @method boolean    isAnimated()
 * @method boolean    isVideo()
 * @method Sticker[]  stickers()
 * @method ?PhotoSize thumbnail()
 * 
 * @method static setName(string $name)
 * @method static setTitle(string $title)
 * @method static setStickerType(string $stickerType)
 * @method static setIsAnimated(boolean $isAnimated)
 * @method static setIsVideo(boolean $isVideo)
 * @method static setStickers(Sticker[] $stickers)
 * @method static setThumbnail(PhotoSize $thumbnail)
 * 
 * @see https://core.telegram.org/bots/api#stickerset
 */
class StickerSet extends baseType
{
    protected array $fields = [
        'name'         => 'string',
        'title'        => 'string',
        'sticker_type' => 'string',
        'is_animated'  => 'boolean',
        'is_video'     => 'boolean',
        'stickers'     => [Sticker::class],
        'thumbnail'    => PhotoSize::class,
    ];

    public function get()
    {
        return $this->recursiveGet();
    }
}
