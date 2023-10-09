<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Represents a link to a video animation (H.264/MPEG-4 AVC video without sound). By default, this animated MPEG-4 file will be sent by the user with optional caption. Alternatively, you can use input_message_content to send a message with the specified content instead of the animation.
 *
 * @property string $type Type of the result, must be mpeg4_gif
 * @property string $id Unique identifier for this result, 1-64 bytes
 * @property string $mpeg4_url A valid URL for the MPEG4 file. File size must not exceed 1MB
 * @property int|null $mpeg4_width Optional. Video width
 * @property int|null $mpeg4_height Optional. Video height
 * @property int|null $mpeg4_duration Optional. Video duration in seconds
 * @property string $thumbnail_url URL of the static (JPEG or GIF) or animated (MPEG4) thumbnail for the result
 * @property string|null $thumbnail_mime_type Optional. MIME type of the thumbnail, must be one of "image/jpeg", "image/gif", or "video/mp4". Defaults to "image/jpeg"
 * @property string|null $title Optional. Title for the result
 * @property string|null $caption Optional. Caption of the MPEG-4 file to be sent, 0-1024 characters after entities parsing
 * @property string|null $parse_mode Optional. Mode for parsing entities in the caption. See formatting options for more details.
 * @property MessageEntity[]|null $caption_entities Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
 * @property InlineKeyboardMarkup|null $reply_markup Optional. Inline keyboard attached to the message
 * @property InputMessageContent|null $input_message_content Optional. Content of the message to be sent instead of the video animation
 *
 * @method string type()
 * @method string id()
 * @method string mpeg4Url()
 * @method int|null mpeg4Width()
 * @method int|null mpeg4Height()
 * @method int|null mpeg4Duration()
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
 * @method static setMpeg4Url(string $mpeg4Url)
 * @method static setMpeg4Width(int|null $mpeg4Width)
 * @method static setMpeg4Height(int|null $mpeg4Height)
 * @method static setMpeg4Duration(int|null $mpeg4Duration)
 * @method static setThumbnailUrl(string $thumbnailUrl)
 * @method static setThumbnailMimeType(string|null $thumbnailMimeType)
 * @method static setTitle(string|null $title)
 * @method static setCaption(string|null $caption)
 * @method static setParseMode(string|null $parseMode)
 * @method static setCaptionEntities(MessageEntity[]|null $captionEntities)
 * @method static setReplyMarkup(InlineKeyboardMarkup|null $replyMarkup)
 * @method static setInputMessageContent(InputMessageContent|null $inputMessageContent)
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


    public static function default(): static
    {
        return (new static())
            ->setType('mpeg4_gif');
    }
}
