<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * This object represents a file ready to be downloaded. The file can be downloaded via the link `https://api.telegram.org/file/bot<token>/<file_path>`
 * 
 * @property string   $file_id        Identifier for this file, which can be used to download or reuse the file
 * @property string   $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
 * @property ?integer $file_size      Optional. File size in bytes. It can be bigger than 2^31 and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing this value.
 * @property ?string  $file_path      Optional. File path. Use `https://api.telegram.org/file/bot<token>/<file_path>` to get the file.
 * 
 * @method string   fileId()
 * @method string   fileUniqueId()
 * @method ?integer fileSize()
 * @method ?string  filePath()
 * 
 * @method static setFileId(string $fileId)
 * @method static setFileUniqueId(string $fileUniqueId)
 * @method static setFileSize(integer $fileSize)
 * @method static setFilePath(string $filePath)
 * 
 * @see https://core.telegram.org/bots/api#file
 */
class File extends baseType
{
    protected array $fields = [
        'file_id'        => 'string',
        'file_unique_id' => 'string',
        'file_size'      => 'integer',
        'file_path'      => 'string',
    ];
}
