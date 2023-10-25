<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents a video message (available in Telegram apps as of v.4.0).
 *
 * @property string $file_id Identifier for this file, which can be used to download or reuse the file
 * @property string $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
 * @property int $length Video width and height (diameter of the video message) as defined by sender
 * @property int $duration Duration of the video in seconds as defined by sender
 * @property PhotoSize|null $thumbnail Optional. Video thumbnail
 * @property int|null $file_size Optional. File size in bytes
 *
 * @method string fileId()
 * @method string fileUniqueId()
 * @method int length()
 * @method int duration()
 * @method PhotoSize|null thumbnail()
 * @method int|null fileSize()
 *
 * @method static setFileId(string $fileId)
 * @method static setFileUniqueId(string $fileUniqueId)
 * @method static setLength(int $length)
 * @method static setDuration(int $duration)
 * @method static setThumbnail(PhotoSize|null $thumbnail)
 * @method static setFileSize(int|null $fileSize)
 *
 * @see https://core.telegram.org/bots/api#videonote
 */
class VideoNote extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'file_id'        => FieldType::single('string'),
            'file_unique_id' => FieldType::single('string'),
            'length'         => FieldType::single('integer'),
            'duration'       => FieldType::single('integer'),
            'thumbnail'      => FieldType::optional(PhotoSize::class),
            'file_size'      => FieldType::optional('integer'),
        ];
    }
}
