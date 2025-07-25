<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Describes an amount of Telegram Stars.
 *
 * @property int $amount Integer amount of Telegram Stars, rounded to 0; can be negative
 * @property int|null $nanostar_amount Optional. The number of 1/1000000000 shares of Telegram Stars; from -999999999 to 999999999; can be negative if and only if amount is non-positive
 *
 * @method int amount()
 * @method int|null nanostarAmount()
 *
 * @method static setAmount(int $amount)
 * @method static setNanostarAmount(int|null $nanostarAmount)
 *
 * @see https://core.telegram.org/bots/api#staramount
 */
class StarAmount extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'amount'          => FieldType::single('integer'),
            'nanostar_amount' => FieldType::optional('integer'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
