<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * This object represents an audio file to be treated as music by the Telegram clients.
 * 
 * @property string    $file_id        Identifier for this file, which can be used to download or reuse the file.
 * @property string    $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file..
 * @property string    $performer      Optional. Performer of the audio as defined by sender or by audio tags
 * @property integer   $duration       Duration of the video in seconds as defined by sender
 * @property string    $file_name      Optional. Original animation filename as defined by sender
 * @property string    $mime_type      Optional. MIME type of the file as defined by sender
 * @property integer   $file_size      Optional. File size in bytes.
 * @property PhotoSize $thumbnail      Optional. Thumbnail of the album cover to which the music file belongs
 * 
 * @method string     fileId()       Identifier for this file
 * @method string     fileUniqueid() Unique identifier for this file
 * @method string     performer()    Performer of the audio 
 * @method integer    duration()     Duration of the video in seconds
 * @method ?string    fileName()     Original animation filename
 * @method ?string    mimeType()     MIME type of the file
 * @method ?integer   fileSize()     File size in bytes
 * @method ?PhotoSize thumbnail()    Thumbnail of the album cover to which the music file belongs
 * 
 * @method static setFileId(string $fileId)
 * @method static setFileUniqueId(string $fileUniqueId)
 * @method static setPerdormer(string $performer)
 * @method static setDuration(int $duration)
 * @method static setFileName(string $fileName)
 * @method static setMimeType(string $mimeType)
 * @method static setFileSize(string $fileSize)
 * @method static setThumbnail(PhotoSize $thumbnail)
 * 
 * @see https://core.telegram.org/bots/api#audio
 */
class Audio extends baseType
{
    protected array $fields = [
        'file_id'        => 'string',
        'file_unique_id' => 'string',
        'duration'       => 'integer',
        'performer'      => 'string',
        'title'          => 'string',
        'file_name'      => 'string',
        'mime_type'      => 'string',
        'file_size'      => 'integer',
        'thumbnail'      => PhotoSize::class
    ];
}

