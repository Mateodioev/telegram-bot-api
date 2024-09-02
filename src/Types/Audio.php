<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * This object represents an audio file to be treated as music by the Telegram clients.
 *
 * @property string $file_id Identifier for this file, which can be used to download or reuse the file
 * @property string $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
 * @property int $duration Duration of the audio in seconds as defined by the sender
 * @property string|null $performer Optional. Performer of the audio as defined by the sender or by audio tags
 * @property string|null $title Optional. Title of the audio as defined by the sender or by audio tags
 * @property string|null $file_name Optional. Original filename as defined by the sender
 * @property string|null $mime_type Optional. MIME type of the file as defined by the sender
 * @property int|null $file_size Optional. File size in bytes. It can be bigger than 2^31 and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing this value.
 * @property PhotoSize|null $thumbnail Optional. Thumbnail of the album cover to which the music file belongs
 *
 * @method string fileId()
 * @method string fileUniqueId()
 * @method int duration()
 * @method string|null performer()
 * @method string|null title()
 * @method string|null fileName()
 * @method string|null mimeType()
 * @method int|null fileSize()
 * @method PhotoSize|null thumbnail()
 *
 * @method static setFileId(string $fileId)
 * @method static setFileUniqueId(string $fileUniqueId)
 * @method static setDuration(int $duration)
 * @method static setPerformer(string|null $performer)
 * @method static setTitle(string|null $title)
 * @method static setFileName(string|null $fileName)
 * @method static setMimeType(string|null $mimeType)
 * @method static setFileSize(int|null $fileSize)
 * @method static setThumbnail(PhotoSize|null $thumbnail)
 *
 * @see https://core.telegram.org/bots/api#audio
 */
class Audio extends abstractType
{
    public function __construct(
        string $file_id,
        string $file_unique_id,
        int $duration,
        ?string $performer = null,
        ?string $title = null,
        ?string $file_name = null,
        ?string $mime_type = null,
        ?int $file_size = null,
        ?PhotoSize $thumbnail = null,
    ) {
        parent::__construct([
            'file_id'        => $file_id,
            'file_unique_id' => $file_unique_id,
            'duration'       => $duration,
            'performer'      => $performer,
            'title'          => $title,
            'file_name'      => $file_name,
            'mime_type'      => $mime_type,
            'file_size'      => $file_size,
            'thumbnail'      => $thumbnail,
        ]);
    }

    protected function boot(): void
    {
        $this->fields = [
            'file_id'        => FieldType::single('string'),
            'file_unique_id' => FieldType::single('string'),
            'duration'       => FieldType::single('integer'),
            'performer'      => FieldType::optional('string'),
            'title'          => FieldType::optional('string'),
            'file_name'      => FieldType::optional('string'),
            'mime_type'      => FieldType::optional('string'),
            'file_size'      => FieldType::optional('integer'),
            'thumbnail'      => FieldType::optional(PhotoSize::class),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
