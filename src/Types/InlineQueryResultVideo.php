<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Represents a link to a page containing an embedded video player or a video file. By default, this video file will be sent by the user with an optional caption. Alternatively, you can use input_message_content to send a message with the specified content instead of the video.
 *
 * @property string $type Type of the result, must be video
 * @property string $id Unique identifier for this result, 1-64 bytes
 * @property string $video_url A valid URL for the embedded video player or video file
 * @property string $mime_type MIME type of the content of the video URL, "text/html" or "video/mp4"
 * @property string $thumbnail_url URL of the thumbnail (JPEG only) for the video
 * @property string $title Title for the result
 * @property string|null $caption Optional. Caption of the video to be sent, 0-1024 characters after entities parsing
 * @property string|null $parse_mode Optional. Mode for parsing entities in the video caption. See formatting options for more details.
 * @property MessageEntity[]|null $caption_entities Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
 * @property int|null $video_width Optional. Video width
 * @property int|null $video_height Optional. Video height
 * @property int|null $video_duration Optional. Video duration in seconds
 * @property string|null $description Optional. Short description of the result
 * @property InlineKeyboardMarkup|null $reply_markup Optional. Inline keyboard attached to the message
 * @property InputMessageContent|null $input_message_content Optional. Content of the message to be sent instead of the video. This field is required if InlineQueryResultVideo is used to send an HTML-page as a result (e.g., a YouTube video).
 *
 * @method string type()
 * @method string id()
 * @method string videoUrl()
 * @method string mimeType()
 * @method string thumbnailUrl()
 * @method string title()
 * @method string|null caption()
 * @method string|null parseMode()
 * @method MessageEntity[]|null captionEntities()
 * @method int|null videoWidth()
 * @method int|null videoHeight()
 * @method int|null videoDuration()
 * @method string|null description()
 * @method InlineKeyboardMarkup|null replyMarkup()
 * @method InputMessageContent|null inputMessageContent()
 *
 * @method static setType(string $type)
 * @method static setId(string $id)
 * @method static setVideoUrl(string $videoUrl)
 * @method static setMimeType(string $mimeType)
 * @method static setThumbnailUrl(string $thumbnailUrl)
 * @method static setTitle(string $title)
 * @method static setCaption(string|null $caption)
 * @method static setParseMode(string|null $parseMode)
 * @method static setCaptionEntities(MessageEntity[]|null $captionEntities)
 * @method static setVideoWidth(int|null $videoWidth)
 * @method static setVideoHeight(int|null $videoHeight)
 * @method static setVideoDuration(int|null $videoDuration)
 * @method static setDescription(string|null $description)
 * @method static setReplyMarkup(InlineKeyboardMarkup|null $replyMarkup)
 * @method static setInputMessageContent(InputMessageContent|null $inputMessageContent)
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultvideo
 */
class InlineQueryResultVideo extends InlineQueryResult
{
    protected function boot(): void
    {
        $this->fields = [
            'type'                  => FieldType::single('string'),
            'id'                    => FieldType::single('string'),
            'video_url'             => FieldType::single('string'),
            'mime_type'             => FieldType::single('string'),
            'thumbnail_url'         => FieldType::single('string'),
            'title'                 => FieldType::single('string'),
            'caption'               => FieldType::optional('string'),
            'parse_mode'            => FieldType::optional('string'),
            'caption_entities'      => new FieldType(MessageEntity::class, allowArrays: true, allowNull: true, subTypes: []),
            'video_width'           => FieldType::optional('integer'),
            'video_height'          => FieldType::optional('integer'),
            'video_duration'        => FieldType::optional('integer'),
            'description'           => FieldType::optional('string'),
            'reply_markup'          => FieldType::optional(InlineKeyboardMarkup::class),
            'input_message_content' => FieldType::optional(InputMessageContent::class),
        ];
    }

    public static function default(): static
    {
        return (new static())
            ->setType('video');
    }
}
