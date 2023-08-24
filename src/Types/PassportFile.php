<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents a file uploaded to Telegram Passport. Currently all Telegram Passport files are in JPEG format when decrypted and don't exceed 10MB.
 *
 * @property string $file_id Identifier for this file, which can be used to download or reuse the file
 * @property string $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
 * @property int $file_size File size in bytes
 * @property int $file_date Unix time when the file was uploaded
 *
 * @method string fileId()
 * @method string fileUniqueId()
 * @method int fileSize()
 * @method int fileDate()
 *
 * @method static setFileId(string $fileId)
 * @method static setFileUniqueId(string $fileUniqueId)
 * @method static setFileSize(int $fileSize)
 * @method static setFileDate(int $fileDate)
 *
 * @see https://core.telegram.org/bots/api#passportfile
 */
class PassportFile extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'file_id'        => FieldType::single('string'),
            'file_unique_id' => FieldType::single('string'),
            'file_size'      => FieldType::single('integer'),
            'file_date'      => FieldType::single('integer'),
        ];
    }
}
