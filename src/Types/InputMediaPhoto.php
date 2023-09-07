<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Represents a photo to be sent.
 *
 * @property string $type Type of the result, must be photo
 * @property string $media File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass an HTTP URL for Telegram to get a file from the Internet, or pass "attach://<file_attach_name>" to upload a new one using multipart/form-data under <file_attach_name> name. More information on Sending Files: https://core.telegram.org/bots/api#sending-files
 * @property ?string $caption Optional. Caption of the photo to be sent, 0-1024 characters after entities parsing
 * @property ?string $parse_mode Optional. Mode for parsing entities in the photo caption. See formatting options for more details.
 * @property ?MessageEntity[] $caption_entities Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
 * @property ?bool $has_spoiler Optional. Pass True if the photo needs to be covered with a spoiler animation
 *
 * @method string type()
 * @method string media()
 * @method ?string caption()
 * @method ?string parseMode()
 * @method ?MessageEntity[] captionEntities()
 * @method ?bool hasSpoiler()
 *
 * @method static setType(string $type)
 * @method static setMedia(string $media)
 * @method static setCaption(?string $caption)
 * @method static setParseMode(?string $parseMode)
 * @method static setCaptionEntities(?MessageEntity[] $captionEntities)
 * @method static setHasSpoiler(?bool $hasSpoiler)
 *
 * @see https://core.telegram.org/bots/api#inputmediaphoto
 */
class InputMediaPhoto extends InputMedia
{
    protected function boot(): void
    {
        $this->fields = [
            'type'             => FieldType::single('string'),
            'media'            => FieldType::single('string'),
            'caption'          => FieldType::optional('string'),
            'parse_mode'       => FieldType::optional('string'),
            'caption_entities' => new FieldType(MessageEntity::class, allowArrays: true, allowNull: true, subTypes: []),
            'has_spoiler'      => FieldType::optional('boolean'),
        ];
    }

    public static function default(): static
    {
        return (new static())
            ->setType('photo');
    }
}
