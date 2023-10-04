<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents a file ready to be downloaded. The file can be downloaded via the link https://api.telegram.org/file/bot<token>/<file_path>. It is guaranteed that the link will be valid for at least 1 hour. When the link expires, a new one can be requested by calling getFile.
 *
 * @property string $file_id Identifier for this file, which can be used to download or reuse the file
 * @property string $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
 * @property ?int $file_size Optional. File size in bytes. It can be bigger than 2^31 and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing this value.
 * @property ?string $file_path Optional. File path. Use https://api.telegram.org/file/bot<token>/<file_path> to get the file.
 *
 * @method string fileId()
 * @method string fileUniqueId()
 * @method ?int fileSize()
 * @method ?string filePath()
 *
 * @method static setFileId(string $fileId)
 * @method static setFileUniqueId(string $fileUniqueId)
 * @method static setFileSize(?int $fileSize)
 * @method static setFilePath(?string $filePath)
 *
 * @see https://core.telegram.org/bots/api#file
 */
class File extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'file_id'        => FieldType::single('string'),
            'file_unique_id' => FieldType::single('string'),
            'file_size'      => FieldType::optional('integer'),
            'file_path'      => FieldType::optional('string'),
        ];
    }

    /**
     * Get HTTPS URL to download the file.
     *
     * @param string $token Bot Token
     */
    public function getDownloadLink(string $token): string
    {
        $fmt = 'https://api.telegram.org/file/bot%s/%s';

        return \sprintf($fmt, $token, $this->filePath());
    }
}
