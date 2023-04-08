<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * This object represents a portion of the price for goods or services.
 * 
 * @property string  $label  Portion label
 * @property integer $amount Price of the product in the smallest units of the [currency](https://core.telegram.org/bots/payments#supported-currencies) (integer, not float/double). For example, for a price of `US$ 1.45` pass `amount = 145`. See the exp parameter in [currencies.json](https://core.telegram.org/bots/payments/currencies.json), it shows the number of digits past the decimal point for each currency (2 for the majority of currencies).
 * 
 * @method string  label()
 * @method integer amount()
 * 
 * @method static setLabel(string $label)
 * @method static setAmount(integer $amount)
 * 
 * @see https://core.telegram.org/bots/api#labeledprice
 */
class LabeledPrice extends baseType
{
    protected array $fields = [
        'label'  => 'string',
        'amount' => 'integer',
    ];
}
