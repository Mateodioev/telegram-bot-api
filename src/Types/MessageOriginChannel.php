<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * The message was originally sent to a channel chat.
 *
 * @property string $type Type of the message origin, always "channel"
 * @property int $date Date the message was sent originally in Unix time
 * @property Chat $chat Channel chat to which the message was originally sent
 * @property int $message_id Unique message identifier inside the chat
 * @property string|null $author_signature Optional. Signature of the original post author
 *
 * @method string type()
 * @method int date()
 * @method Chat chat()
 * @method int messageId()
 * @method string|null authorSignature()
 *
 * @method static setType(string $type)
 * @method static setDate(int $date)
 * @method static setChat(Chat $chat)
 * @method static setMessageId(int $messageId)
 * @method static setAuthorSignature(string|null $authorSignature)
 *
 * @see https://core.telegram.org/bots/api#messageoriginchannel
 */
class MessageOriginChannel extends MessageOrigin
{
    protected function boot(): void
    {
        if ($this->fields !== null) {
            // Already booted
            return;
        }
        $this->fields = [
            'type'             => FieldType::single('string'),
            'date'             => FieldType::single('integer'),
            'chat'             => FieldType::single(Chat::class),
            'message_id'       => FieldType::single('integer'),
            'author_signature' => FieldType::optional('string'),
        ];
    }
}
