<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;
use Mateodioev\Bots\Telegram\Config\FieldsStorage;

/**
 * This object describes a message that was deleted or is otherwise inaccessible to the bot.
 *
 * @property Chat $chat Chat the message belonged to
 * @property int $message_id Unique message identifier inside the chat
 * @property int $date Always 0. The field can be used to differentiate regular and inaccessible messages.
 *
 * @method Chat chat()
 * @method int messageId()
 * @method int date()
 *
 * @method static setChat(Chat $chat)
 * @method static setMessageId(int $messageId)
 * @method static setDate(int $date)
 *
 * @see https://core.telegram.org/bots/api#inaccessiblemessage
 */
class InaccessibleMessage extends MaybeInaccessibleMessage
{
    protected function boot(): void
    {
        $this->fields = [
            'chat'       => FieldType::single(Chat::class),
            'message_id' => FieldType::single('integer'),
            'date'       => FieldType::single('integer'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
