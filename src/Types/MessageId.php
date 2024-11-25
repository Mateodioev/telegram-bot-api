<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * This object represents a unique message identifier.
 *
 * @property int $message_id Unique message identifier. In specific instances (e.g., message containing a video sent to a big chat), the server might automatically schedule a message instead of sending it immediately. In such cases, this field will be 0 and the relevant message will be unusable until it is actually sent
 *
 * @method int messageId()
 *
 * @method static setMessageId(int $messageId)
 *
 * @see https://core.telegram.org/bots/api#messageid
 */
class MessageId extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'message_id' => FieldType::single('integer'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
