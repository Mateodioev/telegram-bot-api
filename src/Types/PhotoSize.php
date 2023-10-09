<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents one size of a photo or a file / sticker thumbnail.
 *
 * @property string $file_id Identifier for this file, which can be used to download or reuse the file
 * @property string $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
 * @property int $width Photo width
 * @property int $height Photo height
 * @property int|null $file_size Optional. File size in bytes
 *
 * @method string fileId()
 * @method string fileUniqueId()
 * @method int width()
 * @method int height()
 * @method int|null fileSize()
 *
 * @method static setFileId(string $fileId)
 * @method static setFileUniqueId(string $fileUniqueId)
 * @method static setWidth(int $width)
 * @method static setHeight(int $height)
 * @method static setFileSize(int|null $fileSize)
 *
 * @see https://core.telegram.org/bots/api#photosize
 */
class PhotoSize extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'file_id'        => FieldType::single('string'),
            'file_unique_id' => FieldType::single('string'),
            'width'          => FieldType::single('integer'),
            'height'         => FieldType::single('integer'),
            'file_size'      => FieldType::optional('integer'),
        ];
    }
}
