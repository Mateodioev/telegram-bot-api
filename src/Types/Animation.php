<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * This object represents an animation file (GIF or H.264/MPEG-4 AVC video without sound).
 *
 * @property string $file_id Identifier for this file, which can be used to download or reuse the file
 * @property string $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
 * @property int $width Video width as defined by the sender
 * @property int $height Video height as defined by the sender
 * @property int $duration Duration of the video in seconds as defined by the sender
 * @property PhotoSize|null $thumbnail Optional. Animation thumbnail as defined by the sender
 * @property string|null $file_name Optional. Original animation filename as defined by the sender
 * @property string|null $mime_type Optional. MIME type of the file as defined by the sender
 * @property int|null $file_size Optional. File size in bytes. It can be bigger than 2^31 and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing this value.
 *
 * @method string fileId()
 * @method string fileUniqueId()
 * @method int width()
 * @method int height()
 * @method int duration()
 * @method PhotoSize|null thumbnail()
 * @method string|null fileName()
 * @method string|null mimeType()
 * @method int|null fileSize()
 *
 * @method static setFileId(string $fileId)
 * @method static setFileUniqueId(string $fileUniqueId)
 * @method static setWidth(int $width)
 * @method static setHeight(int $height)
 * @method static setDuration(int $duration)
 * @method static setThumbnail(PhotoSize|null $thumbnail)
 * @method static setFileName(string|null $fileName)
 * @method static setMimeType(string|null $mimeType)
 * @method static setFileSize(int|null $fileSize)
 *
 * @see https://core.telegram.org/bots/api#animation
 */
class Animation extends abstractType
{
    public function __construct(
        string $file_id,
        string $file_unique_id,
        int $width,
        int $height,
        int $duration,
        ?PhotoSize $thumbnail = null,
        ?string $file_name = null,
        ?string $mime_type = null,
        ?int $file_size = null,
    ) {
        parent::__construct([
            'file_id'        => $file_id,
            'file_unique_id' => $file_unique_id,
            'width'          => $width,
            'height'         => $height,
            'duration'       => $duration,
            'thumbnail'      => $thumbnail,
            'file_name'      => $file_name,
            'mime_type'      => $mime_type,
            'file_size'      => $file_size,
        ]);
    }

    protected function boot(): void
    {
        $this->fields = [
            'file_id'        => FieldType::single('string'),
            'file_unique_id' => FieldType::single('string'),
            'width'          => FieldType::single('integer'),
            'height'         => FieldType::single('integer'),
            'duration'       => FieldType::single('integer'),
            'thumbnail'      => FieldType::optional(PhotoSize::class),
            'thumb'          => FieldType::optional(PhotoSize::class),
            'file_name'      => FieldType::optional('string'),
            'mime_type'      => FieldType::optional('string'),
            'file_size'      => FieldType::optional('integer'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
