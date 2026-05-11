<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * This object represents a live photo.
 *
 * @property PhotoSize[]|null $photo Optional. Available sizes of the corresponding static photo
 * @property string $file_id Identifier for the video file which can be used to download or reuse the file
 * @property string $file_unique_id Unique identifier for the video file which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
 * @property int $width Video width as defined by the sender
 * @property int $height Video height as defined by the sender
 * @property int $duration Duration of the video in seconds as defined by the sender
 * @property string|null $mime_type Optional. MIME type of the file as defined by the sender
 * @property int|null $file_size Optional. File size in bytes. It can be bigger than 2^31 and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing this value.
 *
 * @method PhotoSize[]|null photo()
 * @method string fileId()
 * @method string fileUniqueId()
 * @method int width()
 * @method int height()
 * @method int duration()
 * @method string|null mimeType()
 * @method int|null fileSize()
 *
 * @method static setPhoto(PhotoSize[]|null $photo)
 * @method static setFileId(string $fileId)
 * @method static setFileUniqueId(string $fileUniqueId)
 * @method static setWidth(int $width)
 * @method static setHeight(int $height)
 * @method static setDuration(int $duration)
 * @method static setMimeType(string|null $mimeType)
 * @method static setFileSize(int|null $fileSize)
 *
 * @see https://core.telegram.org/bots/api#livephoto
 */
class LivePhoto extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'photo'          => new FieldType(PhotoSize::class, allowArrays: true, allowNull: true, subTypes: []),
            'file_id'        => FieldType::single('string'),
            'file_unique_id' => FieldType::single('string'),
            'width'          => FieldType::single('integer'),
            'height'         => FieldType::single('integer'),
            'duration'       => FieldType::single('integer'),
            'mime_type'      => FieldType::optional('string'),
            'file_size'      => FieldType::optional('integer'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
