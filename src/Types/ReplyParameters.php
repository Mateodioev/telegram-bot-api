<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Describes reply parameters for the message that is being sent.
 *
 * @property int $message_id Identifier of the message that will be replied to in the current chat, or in the chat chat_id if it is specified
 * @property int|string|null $chat_id Optional. If the message to be replied to is from a different chat, unique identifier for the chat or username of the bot, supergroup or channel in the format @username. Not supported for messages sent on behalf of a business account and messages from channel direct messages chats.
 * @property bool|null $allow_sending_without_reply Optional. Pass True if the message should be sent even if the specified message to be replied to is not found. Always False for replies in another chat or forum topic. Always True for messages sent on behalf of a business account.
 * @property string|null $quote Optional. Quoted part of the message to be replied to; 0-1024 characters after entities parsing. The quote must be an exact substring of the message to be replied to, including bold, italic, underline, strikethrough, spoiler, custom_emoji, and date_time entities. The message will fail to send if the quote isn't found in the original message.
 * @property string|null $quote_parse_mode Optional. Mode for parsing entities in the quote. See formatting options for more details.
 * @property MessageEntity[]|null $quote_entities Optional. A JSON-serialized list of special entities that appear in the quote. It can be specified instead of quote_parse_mode.
 * @property int|null $quote_position Optional. Position of the quote in the original message in UTF-16 code units
 * @property int|null $checklist_task_id Optional. Identifier of the specific checklist task to be replied to
 * @property string|null $poll_option_id Optional. Persistent identifier of the specific poll option to be replied to
 *
 * @method int messageId()
 * @method int|string|null chatId()
 * @method bool|null allowSendingWithoutReply()
 * @method string|null quote()
 * @method string|null quoteParseMode()
 * @method MessageEntity[]|null quoteEntities()
 * @method int|null quotePosition()
 * @method int|null checklistTaskId()
 * @method string|null pollOptionId()
 *
 * @method static setMessageId(int $messageId)
 * @method static setChatId(int|string|null $chatId)
 * @method static setAllowSendingWithoutReply(bool|null $allowSendingWithoutReply)
 * @method static setQuote(string|null $quote)
 * @method static setQuoteParseMode(string|null $quoteParseMode)
 * @method static setQuoteEntities(MessageEntity[]|null $quoteEntities)
 * @method static setQuotePosition(int|null $quotePosition)
 * @method static setChecklistTaskId(int|null $checklistTaskId)
 * @method static setPollOptionId(string|null $pollOptionId)
 *
 * @see https://core.telegram.org/bots/api#replyparameters
 */
class ReplyParameters extends abstractType
{
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
            'checklist_task_id'           => FieldType::optional('integer'),
            'poll_option_id'              => FieldType::optional('string'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
