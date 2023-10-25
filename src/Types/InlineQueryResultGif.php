<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Represents a link to an animated GIF file. By default, this animated GIF file will be sent by the user with optional caption. Alternatively, you can use input_message_content to send a message with the specified content instead of the animation.
 *
 * @property string $type Type of the result, must be gif
 * @property string $id Unique identifier for this result, 1-64 bytes
 * @property string $gif_url A valid URL for the GIF file. File size must not exceed 1MB
 * @property int|null $gif_width Optional. Width of the GIF
 * @property int|null $gif_height Optional. Height of the GIF
 * @property int|null $gif_duration Optional. Duration of the GIF in seconds
 * @property string $thumbnail_url URL of the static (JPEG or GIF) or animated (MPEG4) thumbnail for the result
 * @property string|null $thumbnail_mime_type Optional. MIME type of the thumbnail, must be one of "image/jpeg", "image/gif", or "video/mp4". Defaults to "image/jpeg"
 * @property string|null $title Optional. Title for the result
 * @property string|null $caption Optional. Caption of the GIF file to be sent, 0-1024 characters after entities parsing
 * @property string|null $parse_mode Optional. Mode for parsing entities in the caption. See formatting options for more details.
 * @property MessageEntity[]|null $caption_entities Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
 * @property InlineKeyboardMarkup|null $reply_markup Optional. Inline keyboard attached to the message
 * @property InputMessageContent|null $input_message_content Optional. Content of the message to be sent instead of the GIF animation
 *
 * @method string type()
 * @method string id()
 * @method string gifUrl()
 * @method int|null gifWidth()
 * @method int|null gifHeight()
 * @method int|null gifDuration()
 * @method string thumbnailUrl()
 * @method string|null thumbnailMimeType()
 * @method string|null title()
 * @method string|null caption()
 * @method string|null parseMode()
 * @method MessageEntity[]|null captionEntities()
 * @method InlineKeyboardMarkup|null replyMarkup()
 * @method InputMessageContent|null inputMessageContent()
 *
 * @method static setType(string $type)
 * @method static setId(string $id)
 * @method static setGifUrl(string $gifUrl)
 * @method static setGifWidth(int|null $gifWidth)
 * @method static setGifHeight(int|null $gifHeight)
 * @method static setGifDuration(int|null $gifDuration)
 * @method static setThumbnailUrl(string $thumbnailUrl)
 * @method static setThumbnailMimeType(string|null $thumbnailMimeType)
 * @method static setTitle(string|null $title)
 * @method static setCaption(string|null $caption)
 * @method static setParseMode(string|null $parseMode)
 * @method static setCaptionEntities(MessageEntity[]|null $captionEntities)
 * @method static setReplyMarkup(InlineKeyboardMarkup|null $replyMarkup)
 * @method static setInputMessageContent(InputMessageContent|null $inputMessageContent)
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultgif
 */
class InlineQueryResultGif extends InlineQueryResult
{
    protected function boot(): void
    {
        $this->fields = [
            'type'                  => FieldType::single('string'),
            'id'                    => FieldType::single('string'),
            'gif_url'               => FieldType::single('string'),
            'gif_width'             => FieldType::optional('integer'),
            'gif_height'            => FieldType::optional('integer'),
            'gif_duration'          => FieldType::optional('integer'),
            'thumbnail_url'         => FieldType::single('string'),
            'thumbnail_mime_type'   => FieldType::optional('string'),
            'title'                 => FieldType::optional('string'),
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
            ->setType('gif');
    }
}
