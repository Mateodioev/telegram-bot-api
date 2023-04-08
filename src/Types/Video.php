<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * This object represents a video file.
 * 
 * @property string     $file_id        Identifier for this file, which can be used to download or reuse the file
 * @property string     $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
 * @property integer    $width          Video width as defined by sender
 * @property integer    $height         Video height as defined by sender
 * @property integer    $duration       Duration of the video in seconds as defined by sender
 * @property ?PhotoSize $thumbnail      Optional. Video thumbnail
 * @property ?string    $file_name      Optional. Original filename as defined by sender
 * @property ?string    $mime_type      Optional. MIME type of the file as defined by sender
 * @property ?integer   $file_size      Optional. File size in bytes. It can be bigger than 2^31 and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing this value.
 * 
 * @method string     fileId()
 * @method string     fileUniqueId()
 * @method integer    width()
 * @method integer    height()
 * @method integer    duration()
 * @method ?PhotoSize thumbnail()
 * @method ?string    fileName()
 * @method ?string    mimeType()
 * @method ?integer   fileSize()
 * 
 * @method static setFileId(string $fileId)
 * @method static setFileUniqueId(string $fileUniqueId)
 * @method static setWidth(integer $width)
 * @method static setHeight(integer $height)
 * @method static setDuration(integer $duration)
 * @method static setThumbnail(PhotoSize $thumbnail)
 * @method static setFileName(string $fileName)
 * @method static setMimeType(string $mimeType)
 * @method static setFileSize(integer $fileSize)
 * 
 * @see https://core.telegram.org/bots/api#video
 */
class Video extends baseType
{
    protected array $fields = [
        'file_id'        => 'string',
        'file_unique_id' => 'string',
        'width'          => 'integer',
        'height'         => 'integer',
        'duration'       => 'integer',
        'thumbnail'      => PhotoSize::class,
        'file_name'      => 'string',
        'mime_type'      => 'string',
        'file_size'      => 'integer',
    ];
}
