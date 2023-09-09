<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Represents a link to a file stored on the Telegram servers. By default, this file will be sent by the user with an optional caption. Alternatively, you can use input_message_content to send a message with the specified content instead of the file.
 * Note: This will only work in Telegram versions released after 9 April, 2016. Older clients will ignore them.
 *
 * @property string $type Type of the result, must be document
 * @property string $id Unique identifier for this result, 1-64 bytes
 * @property string $title Title for the result
 * @property string $document_file_id A valid file identifier for the file
 * @property ?string $description Optional. Short description of the result
 * @property ?string $caption Optional. Caption of the document to be sent, 0-1024 characters after entities parsing
 * @property ?string $parse_mode Optional. Mode for parsing entities in the document caption. See formatting options for more details.
 * @property ?MessageEntity[] $caption_entities Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
 * @property ?InlineKeyboardMarkup $reply_markup Optional. Inline keyboard attached to the message
 * @property ?InputMessageContent $input_message_content Optional. Content of the message to be sent instead of the file
 *
 * @method string type()
 * @method string id()
 * @method string title()
 * @method string documentFileId()
 * @method ?string description()
 * @method ?string caption()
 * @method ?string parseMode()
 * @method ?MessageEntity[] captionEntities()
 * @method ?InlineKeyboardMarkup replyMarkup()
 * @method ?InputMessageContent inputMessageContent()
 *
 * @method static setType(string $type)
 * @method static setId(string $id)
 * @method static setTitle(string $title)
 * @method static setDocumentFileId(string $documentFileId)
 * @method static setDescription(?string $description)
 * @method static setCaption(?string $caption)
 * @method static setParseMode(?string $parseMode)
 * @method static setCaptionEntities(?MessageEntity[] $captionEntities)
 * @method static setReplyMarkup(?InlineKeyboardMarkup $replyMarkup)
 * @method static setInputMessageContent(?InputMessageContent $inputMessageContent)
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultcacheddocument
 */
class InlineQueryResultCachedDocument extends InlineQueryResult
{
    protected function boot(): void
    {
        $this->fields = [
            'type'                  => FieldType::single('string'),
            'id'                    => FieldType::single('string'),
            'title'                 => FieldType::single('string'),
            'document_file_id'      => FieldType::single('string'),
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
        return (new static)
            ->setType('document');
    }
}
