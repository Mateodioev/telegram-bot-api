<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents a video file.
 *
 * @property string $file_id Identifier for this file, which can be used to download or reuse the file
 * @property string $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
 * @property int $width Video width as defined by sender
 * @property int $height Video height as defined by sender
 * @property int $duration Duration of the video in seconds as defined by sender
 * @property ?PhotoSize $thumbnail Optional. Video thumbnail
 * @property ?string $file_name Optional. Original filename as defined by sender
 * @property ?string $mime_type Optional. MIME type of the file as defined by sender
 * @property ?int $file_size Optional. File size in bytes. It can be bigger than 2^31 and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing this value.
 *
 * @method string fileId()
 * @method string fileUniqueId()
 * @method int width()
 * @method int height()
 * @method int duration()
 * @method ?PhotoSize thumbnail()
 * @method ?string fileName()
 * @method ?string mimeType()
 * @method ?int fileSize()
 *
 * @method static setFileId(string $fileId)
 * @method static setFileUniqueId(string $fileUniqueId)
 * @method static setWidth(int $width)
 * @method static setHeight(int $height)
 * @method static setDuration(int $duration)
 * @method static setThumbnail(?PhotoSize $thumbnail)
 * @method static setFileName(?string $fileName)
 * @method static setMimeType(?string $mimeType)
 * @method static setFileSize(?int $fileSize)
 *
 * @see https://core.telegram.org/bots/api#video
 */
class Video extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'file_id'        => FieldType::single('string'),
            'file_unique_id' => FieldType::single('string'),
            'width'          => FieldType::single('integer'),
            'height'         => FieldType::single('integer'),
            'duration'       => FieldType::single('integer'),
            'thumbnail'      => FieldType::optional(PhotoSize::class),
            'file_name'      => FieldType::optional('string'),
            'mime_type'      => FieldType::optional('string'),
            'file_size'      => FieldType::optional('integer'),
        ];
    }
}
