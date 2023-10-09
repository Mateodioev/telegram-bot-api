<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Represents a link to a voice recording in an .OGG container encoded with OPUS. By default, this voice recording will be sent by the user. Alternatively, you can use input_message_content to send a message with the specified content instead of the the voice message.
 * Note: This will only work in Telegram versions released after 9 April, 2016. Older clients will ignore them.
 *
 * @property string $type Type of the result, must be voice
 * @property string $id Unique identifier for this result, 1-64 bytes
 * @property string $voice_url A valid URL for the voice recording
 * @property string $title Recording title
 * @property string|null $caption Optional. Caption, 0-1024 characters after entities parsing
 * @property string|null $parse_mode Optional. Mode for parsing entities in the voice message caption. See formatting options for more details.
 * @property MessageEntity[]|null $caption_entities Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
 * @property int|null $voice_duration Optional. Recording duration in seconds
 * @property InlineKeyboardMarkup|null $reply_markup Optional. Inline keyboard attached to the message
 * @property InputMessageContent|null $input_message_content Optional. Content of the message to be sent instead of the voice recording
 *
 * @method string type()
 * @method string id()
 * @method string voiceUrl()
 * @method string title()
 * @method string|null caption()
 * @method string|null parseMode()
 * @method MessageEntity[]|null captionEntities()
 * @method int|null voiceDuration()
 * @method InlineKeyboardMarkup|null replyMarkup()
 * @method InputMessageContent|null inputMessageContent()
 *
 * @method static setType(string $type)
 * @method static setId(string $id)
 * @method static setVoiceUrl(string $voiceUrl)
 * @method static setTitle(string $title)
 * @method static setCaption(string|null $caption)
 * @method static setParseMode(string|null $parseMode)
 * @method static setCaptionEntities(MessageEntity[]|null $captionEntities)
 * @method static setVoiceDuration(int|null $voiceDuration)
 * @method static setReplyMarkup(InlineKeyboardMarkup|null $replyMarkup)
 * @method static setInputMessageContent(InputMessageContent|null $inputMessageContent)
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultvoice
 */
class InlineQueryResultVoice extends InlineQueryResult
{
    protected function boot(): void
    {
        $this->fields = [
            'type'                  => FieldType::single('string'),
            'id'                    => FieldType::single('string'),
            'voice_url'             => FieldType::single('string'),
            'title'                 => FieldType::single('string'),
            'caption'               => FieldType::optional('string'),
            'parse_mode'            => FieldType::optional('string'),
            'caption_entities'      => new FieldType(MessageEntity::class, allowArrays: true, allowNull: true, subTypes: []),
            'voice_duration'        => FieldType::optional('integer'),
            'reply_markup'          => FieldType::optional(InlineKeyboardMarkup::class),
            'input_message_content' => FieldType::optional(InputMessageContent::class),
        ];
    }

    public static function default(): static
    {
        return (new static())
            ->setType('voice');
    }
}
