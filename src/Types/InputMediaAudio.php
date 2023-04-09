<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * Represents an audio file to be treated as music to be sent.
 * 
 * @property string           $type             Type of the result, must be audio
 * @property string           $media            File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass an HTTP URL for Telegram to get a file from the Internet, or pass “attach://<file_attach_name>” to upload a new one using multipart/form-data under <file_attach_name> name.
 * @property ?mixed           $thumbnail        Optional. Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not exceed 320. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be only uploaded as a new file, so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded using multipart/form-data under <file_attach_name>.
 * @property ?string          $caption          Optional. Caption of the audio to be sent, 0-1024 characters after entities parsing
 * @property ?string          $parse_mode       Optional. Mode for parsing entities in the audio caption.
 * @property ?MessageEntity[] $caption_entities Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
 * @property ?integer         $duration         Optional. Duration of the audio in seconds
 * @property ?string          $performer        Optional. Performer of the audio
 * @property ?string          $title            Optional. Title of the audio
 * 
 * @method string           type()
 * @method string           media()
 * @method ?mixed           thumbnail()
 * @method ?string          caption()
 * @method ?string          parseMode()
 * @method ?MessageEntity[] captionEntities()
 * @method ?integer         duration()
 * @method ?string          performer()
 * @method ?string          title()
 * 
 * @method static setType(string $type)
 * @method static setMedia(string $media)
 * @method static setThumbnail(mixed $thumbnail)
 * @method static setCaption(string $caption)
 * @method static setParseMode(string $parseMode)
 * @method static setCaptionEntities(MessageEntity[] $captionEntities)
 * @method static setDuration(integer $duration)
 * @method static set(performer $)
 * @method static setTitle(string $title)
 * 
 * @see https://core.telegram.org/bots/api#inputmediaaudio
 */
class InputMediaAudio extends InputMedia
{
    protected array $fields = [
        'type'             => 'string',
        'media'            => 'string',
        'thumbnail'        => 'mixed',
        'caption'          => 'string',
        'parse_mode'       => 'string',
        'caption_entities' => [MessageEntity::class],
        'duration'         => 'integer',
        'performer'        => 'string',
        'title'            => 'string',
    ];

    public function get()
    {
        return $this->recursiveGet();
    }
}
