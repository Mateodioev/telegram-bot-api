<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Describes a service message about a successful payment for a suggested post.
 *
 * @property Message|null $suggested_post_message Optional. Message containing the suggested post. Note that the Message object in this field will not contain the reply_to_message field even if it itself is a reply.
 * @property string $currency Currency in which the payment was made. Currently, one of "XTR" for Telegram Stars or "TON" for toncoins
 * @property int|null $amount Optional. The amount of the currency that was received by the channel in nanotoncoins; for payments in toncoins only
 * @property StarAmount|null $star_amount Optional. The amount of Telegram Stars that was received by the channel; for payments in Telegram Stars only
 *
 * @method Message|null suggestedPostMessage()
 * @method string currency()
 * @method int|null amount()
 * @method StarAmount|null starAmount()
 *
 * @method static setSuggestedPostMessage(Message|null $suggestedPostMessage)
 * @method static setCurrency(string $currency)
 * @method static setAmount(int|null $amount)
 * @method static setStarAmount(StarAmount|null $starAmount)
 *
 * @see https://core.telegram.org/bots/api#suggestedpostpaid
 */
class SuggestedPostPaid extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'suggested_post_message' => FieldType::optional(Message::class),
            'currency'               => FieldType::single('string'),
            'amount'                 => FieldType::optional('integer'),
            'star_amount'            => FieldType::optional(StarAmount::class),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
