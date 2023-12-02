<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Represents a general file to be sent.
 *
 * @property string $type Type of the result, must be document
 * @property string $media File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass an HTTP URL for Telegram to get a file from the Internet, or pass "attach://<file_attach_name>" to upload a new one using multipart/form-data under <file_attach_name> name. More information on Sending Files: https://core.telegram.org/bots/api#sending-files
 * @property InputFile|string|null $thumbnail Optional. Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not exceed 320. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be only uploaded as a new file, so you can pass "attach://<file_attach_name>" if the thumbnail was uploaded using multipart/form-data under <file_attach_name>. More information on Sending Files: https://core.telegram.org/bots/api#sending-files
 * @property string|null $caption Optional. Caption of the document to be sent, 0-1024 characters after entities parsing
 * @property string|null $parse_mode Optional. Mode for parsing entities in the document caption. See formatting options for more details.
 * @property MessageEntity[]|null $caption_entities Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
 * @property bool|null $disable_content_type_detection Optional. Disables automatic server-side content type detection for files uploaded using multipart/form-data. Always True, if the document is sent as part of an album.
 *
 * @method string type()
 * @method string media()
 * @method InputFile|string|null thumbnail()
 * @method string|null caption()
 * @method string|null parseMode()
 * @method MessageEntity[]|null captionEntities()
 * @method bool|null disableContentTypeDetection()
 *
 * @method static setType(string $type)
 * @method static setMedia(string|InputFile $media)
 * @method static setThumbnail(InputFile|string|null $thumbnail)
 * @method static setCaption(string|null $caption)
 * @method static setParseMode(string|null $parseMode)
 * @method static setCaptionEntities(MessageEntity[]|null $captionEntities)
 * @method static setDisableContentTypeDetection(bool|null $disableContentTypeDetection)
 *
 * @see https://core.telegram.org/bots/api#inputmediadocument
 */
class InputMediaDocument extends InputMedia
{
    protected function boot(): void
    {
        $this->fields = [
            'type'                           => FieldType::single('string'),
            'media'                          => new FieldType(InputFile::class, allowArrays: false, allowNull: false, subTypes: ['string']),
            'thumbnail'                      => FieldType::mixed(),
            'caption'                        => FieldType::optional('string'),
            'parse_mode'                     => FieldType::optional('string'),
            'caption_entities'               => new FieldType(MessageEntity::class, allowArrays: true, allowNull: true, subTypes: []),
            'disable_content_type_detection' => FieldType::optional('boolean'),
        ];
    }

    public static function default(): static
    {
        return (new static())
            ->setType('document');
    }
}
