<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents a portion of the price for goods or services.
 *
 * @property string $label Portion label
 * @property int $amount Price of the product in the smallest units of the currency (integer, not float/double). For example, for a price of US$ 1.45 pass amount = 145. See the exp parameter in currencies.json, it shows the number of digits past the decimal point for each currency (2 for the majority of currencies).
 *
 * @method string label()
 * @method int amount()
 *
 * @method static setLabel(string $label)
 * @method static setAmount(int $amount)
 *
 * @see https://core.telegram.org/bots/api#labeledprice
 */
class LabeledPrice extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'label'  => FieldType::single('string'),
            'amount' => FieldType::single('integer'),
        ];
    }
}
