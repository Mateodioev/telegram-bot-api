<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * This object represents a [video message](https://telegram.org/blog/video-messages-and-telescope) (available in Telegram apps as of [v.4.0](https://telegram.org/blog/video-messages-and-telescope)).
 * 
 * @property string     $file_id        Identifier for this file, which can be used to download or reuse the file
 * @property string     $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
 * @property integer    $length         Video width and height (diameter of the video message) as defined by sender
 * @property integer    $duration       Duration of the video in seconds as defined by sender
 * @property ?PhotoSize $thumbnail      Optional. Video thumbnail
 * @property ?integer   $file_size      Optional. File size in bytes
 * 
 * @method string     fileId()
 * @method string     fileUniqueId()
 * @method integer    length()
 * @method integer    duration()
 * @method ?PhotoSize thumbnail()
 * @method ?integer   fileSize()
 * 
 * @method static setFileId(string $fileId)
 * @method static setFileUniqueId(string $fileUniqueId)
 * @method static setLength(integer $length)
 * @method static setDuration(integer $duration)
 * @method static setThumbnail(PhotoSize $thumbnail)
 * @method static setFileSize(integer $fileSize)
 * 
 * @see https://core.telegram.org/bots/api#videonote
 */
class VideoNote extends baseType
{
    protected array $fields = [
        'file_id'        => 'string',
        'file_unique_id' => 'string',
        'length'         => 'integer',
        'duration'       => 'integer',
        'thumbnail'      => PhotoSize::class,
        'thumb'          => PhotoSize::class, // Legacy param
        'file_size'      => 'integer',
    ];
}
