<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * This object represents a file uploaded to Telegram Passport. Currently all Telegram Passport files are in JPEG format when decrypted and don't exceed 10MB.
 * 
 * @property string  $file_id        Identifier for this file, which can be used to download or reuse the file
 * @property string  $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
 * @property integer $file_size      File size in bytes
 * @property integer $file_date      Unix time when the file was uploaded
 * 
 * @method string  fileId()
 * @method string  fileUniqueId()
 * @method integer fileSize()
 * @method integer fileDate()
 * 
 * @method static setFileId(string $fileId)
 * @method static setFileUniqueId(string $fileUniqueId)
 * @method static setFileSize(integer $fileSize)
 * @method static setFileDate(integer $fileDate)
 * 
 * @see https://core.telegram.org/bots/api#passportfile
 */
class PassportFile extends baseType
{
    protected array $fields = [
        'file_id'        => 'string',
        'file_unique_id' => 'string',
        'file_size'      => 'integer',
        'file_date'      => 'integer',
    ];
}
