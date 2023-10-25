<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents a chat photo.
 *
 * @property string $small_file_id File identifier of small (160x160) chat photo. This file_id can be used only for photo download and only for as long as the photo is not changed.
 * @property string $small_file_unique_id Unique file identifier of small (160x160) chat photo, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
 * @property string $big_file_id File identifier of big (640x640) chat photo. This file_id can be used only for photo download and only for as long as the photo is not changed.
 * @property string $big_file_unique_id Unique file identifier of big (640x640) chat photo, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
 *
 * @method string smallFileId()
 * @method string smallFileUniqueId()
 * @method string bigFileId()
 * @method string bigFileUniqueId()
 *
 * @method static setSmallFileId(string $smallFileId)
 * @method static setSmallFileUniqueId(string $smallFileUniqueId)
 * @method static setBigFileId(string $bigFileId)
 * @method static setBigFileUniqueId(string $bigFileUniqueId)
 *
 * @see https://core.telegram.org/bots/api#chatphoto
 */
class ChatPhoto extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'small_file_id'        => FieldType::single('string'),
            'small_file_unique_id' => FieldType::single('string'),
            'big_file_id'          => FieldType::single('string'),
            'big_file_unique_id'   => FieldType::single('string'),
        ];
    }
}
