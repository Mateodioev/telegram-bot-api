<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Represents a link to an MP3 audio file. By default, this audio file will be sent by the user. Alternatively, you can use input_message_content to send a message with the specified content instead of the audio.
 * Note: This will only work in Telegram versions released after 9 April, 2016. Older clients will ignore them.
 *
 * @property string $type Type of the result, must be audio
 * @property string $id Unique identifier for this result, 1-64 bytes
 * @property string $audio_url A valid URL for the audio file
 * @property string $title Title
 * @property ?string $caption Optional. Caption, 0-1024 characters after entities parsing
 * @property ?string $parse_mode Optional. Mode for parsing entities in the audio caption. See formatting options for more details.
 * @property ?MessageEntity[] $caption_entities Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
 * @property ?string $performer Optional. Performer
 * @property ?int $audio_duration Optional. Audio duration in seconds
 * @property ?InlineKeyboardMarkup $reply_markup Optional. Inline keyboard attached to the message
 * @property ?InputMessageContent $input_message_content Optional. Content of the message to be sent instead of the audio
 *
 * @method string type()
 * @method string id()
 * @method string audioUrl()
 * @method string title()
 * @method ?string caption()
 * @method ?string parseMode()
 * @method ?MessageEntity[] captionEntities()
 * @method ?string performer()
 * @method ?int audioDuration()
 * @method ?InlineKeyboardMarkup replyMarkup()
 * @method ?InputMessageContent inputMessageContent()
 *
 * @method static setType(string $type)
 * @method static setId(string $id)
 * @method static setAudioUrl(string $audioUrl)
 * @method static setTitle(string $title)
 * @method static setCaption(?string $caption)
 * @method static setParseMode(?string $parseMode)
 * @method static setCaptionEntities(?MessageEntity[] $captionEntities)
 * @method static setPerformer(?string $performer)
 * @method static setAudioDuration(?int $audioDuration)
 * @method static setReplyMarkup(?InlineKeyboardMarkup $replyMarkup)
 * @method static setInputMessageContent(?InputMessageContent $inputMessageContent)
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultaudio
 */
class InlineQueryResultAudio extends InlineQueryResult
{
    protected function boot(): void
    {
        $this->fields = [
            'type'                  => FieldType::single('string'),
            'id'                    => FieldType::single('string'),
            'audio_url'             => FieldType::single('string'),
            'title'                 => FieldType::single('string'),
            'caption'               => FieldType::optional('string'),
            'parse_mode'            => FieldType::optional('string'),
            'caption_entities'      => new FieldType(MessageEntity::class, allowArrays: true, allowNull: true, subTypes: []),
            'performer'             => FieldType::optional('string'),
            'audio_duration'        => FieldType::optional('integer'),
            'reply_markup'          => FieldType::optional(InlineKeyboardMarkup::class),
            'input_message_content' => FieldType::optional(InputMessageContent::class),
        ];
    }

    public static function default(): static
    {
        return (new static())
            ->setType('audio');
    }
}
