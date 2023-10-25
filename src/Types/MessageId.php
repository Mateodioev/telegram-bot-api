<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents a unique message identifier.
 *
 * @property int $message_id Unique message identifier
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
    }
}
