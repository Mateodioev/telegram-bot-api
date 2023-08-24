<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Represents a link to a video animation (H.264/MPEG-4 AVC video without sound). By default, this animated MPEG-4 file will be sent by the user with optional caption. Alternatively, you can use input_message_content to send a message with the specified content instead of the animation.
 *
 * @property string $type Type of the result, must be mpeg4_gif
 * @property string $id Unique identifier for this result, 1-64 bytes
 * @property string $mpeg4_url A valid URL for the MPEG4 file. File size must not exceed 1MB
 * @property ?int $mpeg4_width Optional. Video width
 * @property ?int $mpeg4_height Optional. Video height
 * @property ?int $mpeg4_duration Optional. Video duration in seconds
 * @property string $thumbnail_url URL of the static (JPEG or GIF) or animated (MPEG4) thumbnail for the result
 * @property ?string $thumbnail_mime_type Optional. MIME type of the thumbnail, must be one of "image/jpeg", "image/gif", or "video/mp4". Defaults to "image/jpeg"
 * @property ?string $title Optional. Title for the result
 * @property ?string $caption Optional. Caption of the MPEG-4 file to be sent, 0-1024 characters after entities parsing
 * @property ?string $parse_mode Optional. Mode for parsing entities in the caption. See formatting options for more details.
 * @property ?MessageEntity[] $caption_entities Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
 * @property ?InlineKeyboardMarkup $reply_markup Optional. Inline keyboard attached to the message
 * @property ?InputMessageContent $input_message_content Optional. Content of the message to be sent instead of the video animation
 *
 * @method string type()
 * @method string id()
 * @method string mpeg4Url()
 * @method ?int mpeg4Width()
 * @method ?int mpeg4Height()
 * @method ?int mpeg4Duration()
 * @method string thumbnailUrl()
 * @method ?string thumbnailMimeType()
 * @method ?string title()
 * @method ?string caption()
 * @method ?string parseMode()
 * @method ?MessageEntity[] captionEntities()
 * @method ?InlineKeyboardMarkup replyMarkup()
 * @method ?InputMessageContent inputMessageContent()
 *
 * @method static setType(string $type)
 * @method static setId(string $id)
 * @method static setMpeg4Url(string $mpeg4Url)
 * @method static setMpeg4Width(?int $mpeg4Width)
 * @method static setMpeg4Height(?int $mpeg4Height)
 * @method static setMpeg4Duration(?int $mpeg4Duration)
 * @method static setThumbnailUrl(string $thumbnailUrl)
 * @method static setThumbnailMimeType(?string $thumbnailMimeType)
 * @method static setTitle(?string $title)
 * @method static setCaption(?string $caption)
 * @method static setParseMode(?string $parseMode)
 * @method static setCaptionEntities(?MessageEntity[] $captionEntities)
 * @method static setReplyMarkup(?InlineKeyboardMarkup $replyMarkup)
 * @method static setInputMessageContent(?InputMessageContent $inputMessageContent)
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultmpeg4gif
 */
class InlineQueryResultMpeg4Gif extends InlineQueryResult
{
    protected function boot(): void
    {
        $this->fields = [
            'type'                  => FieldType::single('string'),
            'id'                    => FieldType::single('string'),
            'mpeg4_url'             => FieldType::single('string'),
            'mpeg4_width'           => FieldType::optional('integer'),
            'mpeg4_height'          => FieldType::optional('integer'),
            'mpeg4_duration'        => FieldType::optional('integer'),
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
}
