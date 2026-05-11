<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Represents a sticker file to be sent.
 *
 * @property string $type Type of the result, must be sticker
 * @property string $media File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass an HTTP URL for Telegram to get a .WEBP sticker from the Internet, or pass "attach://<file_attach_name>" to upload a new .WEBP, .TGS, or .WEBM sticker using multipart/form-data under <file_attach_name> name. More information on Sending Files: https://core.telegram.org/bots/api#sending-files
 * @property string|null $emoji Optional. Emoji associated with the sticker; only for just uploaded stickers
 *
 * @method string type()
 * @method string media()
 * @method string|null emoji()
 *
 * @method static setType(string $type)
 * @method static setMedia(string $media)
 * @method static setEmoji(string|null $emoji)
 *
 * @see https://core.telegram.org/bots/api#inputmediasticker
 */
class InputMediaSticker extends InputPollOptionMedia
{
    protected function boot(): void
    {
        $this->fields = [
            'type'  => FieldType::single('string'),
            'media' => FieldType::single('string'),
            'emoji' => FieldType::optional('string'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }

    public static function default(): static
    {
        return (new static())
            ->setType('sticker');
    }
}
