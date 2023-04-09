<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * Represents an animation file (GIF or H.264/MPEG-4 AVC video without sound) to be sent.
 * 
 * @property string           $type             Type of the result, must be animation
 * @property string           $media            File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass an HTTP URL for Telegram to get a file from the Internet, or pass “attach://<file_attach_name>” to upload a new one using multipart/form-data under <file_attach_name> name.
 * @property ?mixed           $thumbnail        Optional. Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not exceed 320.
 * @property ?string          $caption          Optional. Caption of the animation to be sent, 0-1024 characters after entities parsing
 * @property ?string          $parse_mode       Optional. Mode for parsing entities in the animation caption.
 * @property ?MessageEntity[] $caption_entities Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
 * @property ?integer         $width            Optional. Animation width
 * @property ?integer         $height           Optional. Animation height
 * @property ?integer         $duration         Optional. Animation duration in seconds
 * @property ?boolean         $has_spoiler      Optional. Pass True if the animation needs to be covered with a spoiler animation
 * 
 * @method string           type()
 * @method string           media()
 * @method ?mixed           thumbnail()
 * @method ?string          caption()
 * @method ?string          parseMode()
 * @method ?MessageEntity[] captionEntities()
 * @method ?integer         width()
 * @method ?integer         height()
 * @method ?integer         duration()
 * @method ?boolean         hasSpoiler()
 * 
 * @method static setType(string $type)
 * @method static setMedia(string $media)
 * @method static setThumbnail(mixed $thumbnail)
 * @method static setCaption(string $caption)
 * @method static setParseMode(string $parseMode)
 * @method static setCaptionEntities(MessageEntity[] $captionEntities)
 * @method static setWidth(integer $width)
 * @method static setHeight(integer $height)
 * @method static setDuration(integer $duration)
 * @method static setHasSpoiler(boolean $hasSpoiler)
 * 
 * @see https://core.telegram.org/bots/api#inputmediaanimation
 */
class InputMediaAnimation extends InputMedia
{
    protected array $fields = [
        'type'             => 'string',
        'media'            => 'string',
        'thumbnail'        => 'mixed',
        'caption'          => 'string',
        'parse_mode'       => 'string',
        'caption_entities' => [MessageEntity::class],
        'width'            => 'integer',
        'height'           => 'integer',
        'duration'         => 'integer',
        'has_spoiler'      => 'boolean',
    ];

    public function get()
    {
        return $this->recursiveGet();
    }
}
