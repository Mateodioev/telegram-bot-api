<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Describes reply parameters for the message that is being sent.
 *
 * @property int $message_id Identifier of the message that will be replied to in the current chat, or in the chat chat_id if it is specified
 * @property int|string|null $chat_id Optional. If the message to be replied to is from a different chat, unique identifier for the chat or username of the channel (in the format @channelusername). Not supported for messages sent on behalf of a business account.
 * @property bool|null $allow_sending_without_reply Optional. Pass True if the message should be sent even if the specified message to be replied to is not found. Always False for replies in another chat or forum topic. Always True for messages sent on behalf of a business account.
 * @property string|null $quote Optional. Quoted part of the message to be replied to; 0-1024 characters after entities parsing. The quote must be an exact substring of the message to be replied to, including bold, italic, underline, strikethrough, spoiler, and custom_emoji entities. The message will fail to send if the quote isn't found in the original message.
 * @property string|null $quote_parse_mode Optional. Mode for parsing entities in the quote. See formatting options for more details.
 * @property MessageEntity[]|null $quote_entities Optional. A JSON-serialized list of special entities that appear in the quote. It can be specified instead of quote_parse_mode.
 * @property int|null $quote_position Optional. Position of the quote in the original message in UTF-16 code units
 *
 * @method int messageId()
 * @method int|string|null chatId()
 * @method bool|null allowSendingWithoutReply()
 * @method string|null quote()
 * @method string|null quoteParseMode()
 * @method MessageEntity[]|null quoteEntities()
 * @method int|null quotePosition()
 *
 * @method static setMessageId(int $messageId)
 * @method static setChatId(int|string|null $chatId)
 * @method static setAllowSendingWithoutReply(bool|null $allowSendingWithoutReply)
 * @method static setQuote(string|null $quote)
 * @method static setQuoteParseMode(string|null $quoteParseMode)
 * @method static setQuoteEntities(MessageEntity[]|null $quoteEntities)
 * @method static setQuotePosition(int|null $quotePosition)
 *
 * @see https://core.telegram.org/bots/api#replyparameters
 */
class ReplyParameters extends abstractType
{
    public function __construct(
        int $message_id,
        int|string|null $chat_id = null,
        ?bool $allow_sending_without_reply = null,
        ?string $quote = null,
        ?string $quote_parse_mode = null,
        ?array $quote_entities = null,
        ?int $quote_position = null,
    ) {
        parent::__construct([
            'message_id'                  => $message_id,
            'chat_id'                     => $chat_id,
            'allow_sending_without_reply' => $allow_sending_without_reply,
            'quote'                       => $quote,
            'quote_parse_mode'            => $quote_parse_mode,
            'quote_entities'              => $quote_entities,
            'quote_position'              => $quote_position,
        ]);
    }

    protected function boot(): void
    {
        $this->fields = [
            'message_id'                  => FieldType::single('integer'),
            'chat_id'                     => new FieldType('string', allowArrays: false, allowNull: true, subTypes: ['integer']),
            'allow_sending_without_reply' => FieldType::optional('boolean'),
            'quote'                       => FieldType::optional('string'),
            'quote_parse_mode'            => FieldType::optional('string'),
            'quote_entities'              => new FieldType(MessageEntity::class, allowArrays: true, allowNull: true, subTypes: []),
            'quote_position'              => FieldType::optional('integer'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
