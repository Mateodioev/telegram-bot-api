<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Describes a service message about a payment refund for a suggested post.
 *
 * @property Message|null $suggested_post_message Optional. Message containing the suggested post. Note that the Message object in this field will not contain the reply_to_message field even if it itself is a reply.
 * @property string $reason Reason for the refund. Currently, one of "post_deleted" if the post was deleted within 24 hours of being posted or removed from scheduled messages without being posted, or "payment_refunded" if the payer refunded their payment.
 *
 * @method Message|null suggestedPostMessage()
 * @method string reason()
 *
 * @method static setSuggestedPostMessage(Message|null $suggestedPostMessage)
 * @method static setReason(string $reason)
 *
 * @see https://core.telegram.org/bots/api#suggestedpostrefunded
 */
class SuggestedPostRefunded extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'suggested_post_message' => FieldType::optional(Message::class),
            'reason'                 => FieldType::single('string'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
