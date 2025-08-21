<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Describes price of a suggested post.
 *
 * @property string $currency Currency in which the post will be paid. Currently, must be one of "XTR" for Telegram Stars or "TON" for toncoins
 * @property int $amount The amount of the currency that will be paid for the post in the smallest units of the currency, i.e. Telegram Stars or nanotoncoins. Currently, price in Telegram Stars must be between 5 and 100000, and price in nanotoncoins must be between 10000000 and 10000000000000.
 *
 * @method string currency()
 * @method int amount()
 *
 * @method static setCurrency(string $currency)
 * @method static setAmount(int $amount)
 *
 * @see https://core.telegram.org/bots/api#suggestedpostprice
 */
class SuggestedPostPrice extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'currency' => FieldType::single('string'),
            'amount'   => FieldType::single('integer'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
