<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents a general file (as opposed to photos, voice messages and audio files).
 *
 * @property string $file_id Identifier for this file, which can be used to download or reuse the file
 * @property string $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
 * @property PhotoSize|null $thumbnail Optional. Document thumbnail as defined by sender
 * @property string|null $file_name Optional. Original filename as defined by sender
 * @property string|null $mime_type Optional. MIME type of the file as defined by sender
 * @property int|null $file_size Optional. File size in bytes. It can be bigger than 2^31 and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing this value.
 *
 * @method string fileId()
 * @method string fileUniqueId()
 * @method PhotoSize|null thumbnail()
 * @method string|null fileName()
 * @method string|null mimeType()
 * @method int|null fileSize()
 *
 * @method static setFileId(string $fileId)
 * @method static setFileUniqueId(string $fileUniqueId)
 * @method static setThumbnail(PhotoSize|null $thumbnail)
 * @method static setFileName(string|null $fileName)
 * @method static setMimeType(string|null $mimeType)
 * @method static setFileSize(int|null $fileSize)
 *
 * @see https://core.telegram.org/bots/api#document
 */
class Document extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'file_id'        => FieldType::single('string'),
            'file_unique_id' => FieldType::single('string'),
            'thumbnail'      => FieldType::optional(PhotoSize::class),
            'thumb'          => FieldType::optional(PhotoSize::class), // Legacy param
            'file_name'      => FieldType::optional('string'),
            'mime_type'      => FieldType::optional('string'),
            'file_size'      => FieldType::optional('integer'),
        ];
    }
}
