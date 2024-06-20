<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents reaction changes on a message with anonymous reactions.
 *
 * @property Chat $chat The chat containing the message
 * @property int $message_id Unique message identifier inside the chat
 * @property int $date Date of the change in Unix time
 * @property ReactionCount[] $reactions List of reactions that are present on the message
 *
 * @method Chat chat()
 * @method int messageId()
 * @method int date()
 * @method ReactionCount[] reactions()
 *
 * @method static setChat(Chat $chat)
 * @method static setMessageId(int $messageId)
 * @method static setDate(int $date)
 * @method static setReactions(ReactionCount[] $reactions)
 *
 * @see https://core.telegram.org/bots/api#messagereactioncountupdated
 */
class MessageReactionCountUpdated extends abstractType
{
    protected function boot(): void
    {
        if ($this->fields !== null) {
            // Already booted
            return;
        }
        $this->fields = [
            'chat'       => FieldType::single(Chat::class),
            'message_id' => FieldType::single('integer'),
            'date'       => FieldType::single('integer'),
            'reactions'  => FieldType::multiple(ReactionCount::class),
        ];
    }
}
