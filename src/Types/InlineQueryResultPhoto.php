<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Represents a link to a photo. By default, this photo will be sent by the user with optional caption. Alternatively, you can use input_message_content to send a message with the specified content instead of the photo.
 *
 * @property string $type Type of the result, must be photo
 * @property string $id Unique identifier for this result, 1-64 bytes
 * @property string $photo_url A valid URL of the photo. Photo must be in JPEG format. Photo size must not exceed 5MB
 * @property string $thumbnail_url URL of the thumbnail for the photo
 * @property ?int $photo_width Optional. Width of the photo
 * @property ?int $photo_height Optional. Height of the photo
 * @property ?string $title Optional. Title for the result
 * @property ?string $description Optional. Short description of the result
 * @property ?string $caption Optional. Caption of the photo to be sent, 0-1024 characters after entities parsing
 * @property ?string $parse_mode Optional. Mode for parsing entities in the photo caption. See formatting options for more details.
 * @property ?MessageEntity[] $caption_entities Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
 * @property ?InlineKeyboardMarkup $reply_markup Optional. Inline keyboard attached to the message
 * @property ?InputMessageContent $input_message_content Optional. Content of the message to be sent instead of the photo
 *
 * @method string type()
 * @method string id()
 * @method string photoUrl()
 * @method string thumbnailUrl()
 * @method ?int photoWidth()
 * @method ?int photoHeight()
 * @method ?string title()
 * @method ?string description()
 * @method ?string caption()
 * @method ?string parseMode()
 * @method ?MessageEntity[] captionEntities()
 * @method ?InlineKeyboardMarkup replyMarkup()
 * @method ?InputMessageContent inputMessageContent()
 *
 * @method static setType(string $type)
 * @method static setId(string $id)
 * @method static setPhotoUrl(string $photoUrl)
 * @method static setThumbnailUrl(string $thumbnailUrl)
 * @method static setPhotoWidth(?int $photoWidth)
 * @method static setPhotoHeight(?int $photoHeight)
 * @method static setTitle(?string $title)
 * @method static setDescription(?string $description)
 * @method static setCaption(?string $caption)
 * @method static setParseMode(?string $parseMode)
 * @method static setCaptionEntities(?MessageEntity[] $captionEntities)
 * @method static setReplyMarkup(?InlineKeyboardMarkup $replyMarkup)
 * @method static setInputMessageContent(?InputMessageContent $inputMessageContent)
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultphoto
 */
class InlineQueryResultPhoto extends InlineQueryResult
{
    protected function boot(): void
    {
        $this->fields = [
            'type'                  => FieldType::single('string'),
            'id'                    => FieldType::single('string'),
            'photo_url'             => FieldType::single('string'),
            'thumbnail_url'         => FieldType::single('string'),
            'photo_width'           => FieldType::optional('integer'),
            'photo_height'          => FieldType::optional('integer'),
            'title'                 => FieldType::optional('string'),
            'description'           => FieldType::optional('string'),
            'caption'               => FieldType::optional('string'),
            'parse_mode'            => FieldType::optional('string'),
            'caption_entities'      => new FieldType(MessageEntity::class, allowArrays: true, allowNull: true, subTypes: []),
            'reply_markup'          => FieldType::optional(InlineKeyboardMarkup::class),
            'input_message_content' => FieldType::optional(InputMessageContent::class),
        ];
    }

    public static function default(): static
    {
        return (new static())
            ->setType('photo');
    }
}
