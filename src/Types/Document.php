<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * This object represents a general file (as opposed to [photos](https://core.telegram.org/bots/api#photosize), [voice messages](https://core.telegram.org/bots/api#voice) and [audio files](https://core.telegram.org/bots/api#audio)).
 * 
 * @property string $file_id Identifier for this file, which can be used to download or reuse the file
 * @property string $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
 * @property ?PhotoSize $thumbnail Optional. Document thumbnail as defined by sender
 * @property ?string $file_name Optional. Original filename as defined by sender
 * @property ?string $mime_type Optional. MIME type of the file as defined by sender
 * @property ?integer $file_size Optional. File size in bytes. It can be bigger than 2^31 and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing this value.
 * 
 * @method string fileId()
 * @method string fileUniqueId()
 * @method ?PhotoSize thumbnail()
 * @method ?string fileName()
 * @method ?string mimeType()
 * @method ?integer fileSize()
 * 
 * @method static setFileId(string $fileId)
 * @method static setFileUniqueId(string $fileUniqueId)
 * @method static setThumbnail(PhotoSize $thumbnail)
 * @method static setFileName(string $fileName)
 * @method static setMimeType(string $mimeType)
 * @method static setFileSize(integer $fileSize)
 * 
 * @see https://core.telegram.org/bots/api#document
 */
class Document extends baseType
{
    protected array $fields = [
        'file_id'        => 'string',
        'file_unique_id' => 'string',
        'thumbnail'      => PhotoSize::class,
        'thumb'          => PhotoSize::class, // Legacy param
        'file_name'      => 'string',
        'mime_type'      => 'string',
        'file_size'      => 'integer',
    ];
}
