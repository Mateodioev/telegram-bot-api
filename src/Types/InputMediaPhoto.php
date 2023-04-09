<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * Represents a photo to be sent.
 * 
 * @property string           $type             Type of the result, must be photo
 * @property string           $media            File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass an HTTP URL for Telegram to get a file from the Internet, or pass “attach://<file_attach_name>” to upload a new one using multipart/form-data under <file_attach_name> name.
 * @property ?string          $caption          Optional. Caption of the photo to be sent, 0-1024 characters after entities parsing
 * @property ?string          $parse_mode       Optional. Mode for parsing entities in the photo caption.
 * @property ?MessageEntity[] $caption_entities Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
 * @property ?boolean         $has_spoiler      Optional. Pass True if the photo needs to be covered with a spoiler animation
 * 
 * @method string           type()
 * @method string           media()
 * @method ?string          caption()
 * @method ?string          parseMode()
 * @method ?MessageEntity[] captionEntities()
 * @method ?boolean         hasSpoiler()
 * 
 * @method static setType(string $type)
 * @method static setMedia(string $media)
 * @method static setCaption(string $caption)
 * @method static setParseMode(string $parseMode)
 * @method static setCaptionEntities(MessageEntity[] $captionEntities)
 * @method static setHasSpoiler(boolean $hasSpoiler)
 * 
 * @see https://core.telegram.org/bots/api#inputmediaphoto
 */
class InputMediaPhoto extends InputMedia
{
    protected array $fields = [
        'type'             => 'string',
        'media'            => 'string',
        'caption'          => 'string',
        'parse_mode'       => 'string',
        'caption_entities' => [MessageEntity::class],
        'has_spoiler'      => 'boolean',
    ];

    public function get()
    {
        return $this->recursiveGet();
    }
}
