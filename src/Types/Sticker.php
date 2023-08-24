<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents a sticker.
 *
 * @property string $file_id Identifier for this file, which can be used to download or reuse the file
 * @property string $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
 * @property string $type Type of the sticker, currently one of "regular", "mask", "custom_emoji". The type of the sticker is independent from its format, which is determined by the fields is_animated and is_video.
 * @property int $width Sticker width
 * @property int $height Sticker height
 * @property bool $is_animated True, if the sticker is animated
 * @property bool $is_video True, if the sticker is a video sticker
 * @property ?PhotoSize $thumbnail Optional. Sticker thumbnail in the .WEBP or .JPG format
 * @property ?string $emoji Optional. Emoji associated with the sticker
 * @property ?string $set_name Optional. Name of the sticker set to which the sticker belongs
 * @property ?File $premium_animation Optional. For premium regular stickers, premium animation for the sticker
 * @property ?MaskPosition $mask_position Optional. For mask stickers, the position where the mask should be placed
 * @property ?string $custom_emoji_id Optional. For custom emoji stickers, unique identifier of the custom emoji
 * @property ?bool $needs_repainting Optional. True, if the sticker must be repainted to a text color in messages, the color of the Telegram Premium badge in emoji status, white color on chat photos, or another appropriate color in other places
 * @property ?int $file_size Optional. File size in bytes
 *
 * @method string fileId()
 * @method string fileUniqueId()
 * @method string type()
 * @method int width()
 * @method int height()
 * @method bool isAnimated()
 * @method bool isVideo()
 * @method ?PhotoSize thumbnail()
 * @method ?string emoji()
 * @method ?string setName()
 * @method ?File premiumAnimation()
 * @method ?MaskPosition maskPosition()
 * @method ?string customEmojiId()
 * @method ?bool needsRepainting()
 * @method ?int fileSize()
 *
 * @method static setFileId(string $fileId)
 * @method static setFileUniqueId(string $fileUniqueId)
 * @method static setType(string $type)
 * @method static setWidth(int $width)
 * @method static setHeight(int $height)
 * @method static setIsAnimated(bool $isAnimated)
 * @method static setIsVideo(bool $isVideo)
 * @method static setThumbnail(?PhotoSize $thumbnail)
 * @method static setEmoji(?string $emoji)
 * @method static setSetName(?string $setName)
 * @method static setPremiumAnimation(?File $premiumAnimation)
 * @method static setMaskPosition(?MaskPosition $maskPosition)
 * @method static setCustomEmojiId(?string $customEmojiId)
 * @method static setNeedsRepainting(?bool $needsRepainting)
 * @method static setFileSize(?int $fileSize)
 *
 * @see https://core.telegram.org/bots/api#sticker
 */
class Sticker extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'file_id'           => FieldType::single('string'),
            'file_unique_id'    => FieldType::single('string'),
            'type'              => FieldType::single('string'),
            'width'             => FieldType::single('integer'),
            'height'            => FieldType::single('integer'),
            'is_animated'       => FieldType::single('boolean'),
            'is_video'          => FieldType::single('boolean'),
            'thumbnail'         => FieldType::optional(PhotoSize::class),
            'emoji'             => FieldType::optional('string'),
            'set_name'          => FieldType::optional('string'),
            'premium_animation' => FieldType::optional(File::class),
            'mask_position'     => FieldType::optional(MaskPosition::class),
            'custom_emoji_id'   => FieldType::optional('string'),
            'needs_repainting'  => FieldType::optional('boolean'),
            'file_size'         => FieldType::optional('integer'),
        ];
    }
}
