<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Describes a service message about a change in the price of paid messages within a chat.
 *
 * @property int $paid_message_star_count The new number of Telegram Stars that must be paid by non-administrator users of the supergroup chat for each sent message
 *
 * @method int paidMessageStarCount()
 *
 * @method static setPaidMessageStarCount(int $paidMessageStarCount)
 *
 * @see https://core.telegram.org/bots/api#paidmessagepricechanged
 */
class PaidMessagePriceChanged extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'paid_message_star_count' => FieldType::single('integer'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
