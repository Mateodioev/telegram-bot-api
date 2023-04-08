<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * This object represents a voice note.
 * 
 * @property string   $file_id none
 * @property string   $file_unique_id none
 * @property integer  $duration none
 * @property ?string  $mime_type none
 * @property ?integer $file_size none
 * 
 * @method string   fileId()
 * @method string   fileUniqueId()
 * @method integer  duration()
 * @method ?string  mimeType()
 * @method ?integer fileSize()
 * 
 * @method static setFileId(string $fileId)
 * @method static setFileUniqueId(string $fileUniqueId)
 * @method static setDuration(integer $duration)
 * @method static setMimeType(string $mimeType)
 * @method static setFileSize(integer $fileSize)
 * 
 * @see https://core.telegram.org/bots/api#voice
 */
class Voice extends baseType
{
    protected array $fields = [
        'file_id'        => 'string',
        'file_unique_id' => 'string',
        'duration'       => 'integer',
        'mime_type'      => 'string',
        'file_size'      => 'integer',
    ];
}
