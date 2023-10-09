<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Represents a link to an animated GIF file stored on the Telegram servers. By default, this animated GIF file will be sent by the user with an optional caption. Alternatively, you can use input_message_content to send a message with specified content instead of the animation.
 *
 * @property string $type Type of the result, must be gif
 * @property string $id Unique identifier for this result, 1-64 bytes
 * @property string $gif_file_id A valid file identifier for the GIF file
 * @property string|null $title Optional. Title for the result
 * @property string|null $caption Optional. Caption of the GIF file to be sent, 0-1024 characters after entities parsing
 * @property string|null $parse_mode Optional. Mode for parsing entities in the caption. See formatting options for more details.
 * @property MessageEntity[]|null $caption_entities Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
 * @property InlineKeyboardMarkup|null $reply_markup Optional. Inline keyboard attached to the message
 * @property InputMessageContent|null $input_message_content Optional. Content of the message to be sent instead of the GIF animation
 *
 * @method string type()
 * @method string id()
 * @method string gifFileId()
 * @method string|null title()
 * @method string|null caption()
 * @method string|null parseMode()
 * @method MessageEntity[]|null captionEntities()
 * @method InlineKeyboardMarkup|null replyMarkup()
 * @method InputMessageContent|null inputMessageContent()
 *
 * @method static setType(string $type)
 * @method static setId(string $id)
 * @method static setGifFileId(string $gifFileId)
 * @method static setTitle(string|null $title)
 * @method static setCaption(string|null $caption)
 * @method static setParseMode(string|null $parseMode)
 * @method static setCaptionEntities(MessageEntity[]|null $captionEntities)
 * @method static setReplyMarkup(InlineKeyboardMarkup|null $replyMarkup)
 * @method static setInputMessageContent(InputMessageContent|null $inputMessageContent)
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultcachedgif
 */
class InlineQueryResultCachedGif extends InlineQueryResult
{
    protected function boot(): void
    {
        $this->fields = [
            'type'                  => FieldType::single('string'),
            'id'                    => FieldType::single('string'),
            'gif_file_id'           => FieldType::single('string'),
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
