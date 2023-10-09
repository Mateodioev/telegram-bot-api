<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object describes a sticker to be added to a sticker set.
 *
 * @property InputFile|string $sticker The added sticker. Pass a file_id as a String to send a file that already exists on the Telegram servers, pass an HTTP URL as a String for Telegram to get a file from the Internet, upload a new one using multipart/form-data, or pass "attach://<file_attach_name>" to upload a new one using multipart/form-data under <file_attach_name> name. Animated and video stickers can't be uploaded via HTTP URL. More information on Sending Files: https://core.telegram.org/bots/api#sending-files
 * @property string[] $emoji_list List of 1-20 emoji associated with the sticker
 * @property MaskPosition|null $mask_position Optional. Position where the mask should be placed on faces. For "mask" stickers only.
 * @property string[]|null $keywords Optional. List of 0-20 search keywords for the sticker with total length of up to 64 characters. For "regular" and "custom_emoji" stickers only.
 *
 * @method InputFile|string sticker()
 * @method string[] emojiList()
 * @method MaskPosition|null maskPosition()
 * @method string[]|null keywords()
 *
 * @method static setSticker(InputFile|string $sticker)
 * @method static setEmojiList(string[] $emojiList)
 * @method static setMaskPosition(MaskPosition|null $maskPosition)
 * @method static setKeywords(string[]|null $keywords)
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
