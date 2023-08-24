<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object contains basic information about an invoice.
 *
 * @property string $title Product name
 * @property string $description Product description
 * @property string $start_parameter Unique bot deep-linking parameter that can be used to generate this invoice
 * @property string $currency Three-letter ISO 4217 currency code
 * @property int $total_amount Total price in the smallest units of the currency (integer, not float/double). For example, for a price of US$ 1.45 pass amount = 145. See the exp parameter in currencies.json, it shows the number of digits past the decimal point for each currency (2 for the majority of currencies).
 *
 * @method string title()
 * @method string description()
 * @method string startParameter()
 * @method string currency()
 * @method int totalAmount()
 *
 * @method static setTitle(string $title)
 * @method static setDescription(string $description)
 * @method static setStartParameter(string $startParameter)
 * @method static setCurrency(string $currency)
 * @method static setTotalAmount(int $totalAmount)
 *
 * @see https://core.telegram.org/bots/api#invoice
 */
class Invoice extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'title'           => FieldType::single('string'),
            'description'     => FieldType::single('string'),
            'start_parameter' => FieldType::single('string'),
            'currency'        => FieldType::single('string'),
            'total_amount'    => FieldType::single('integer'),
        ];
    }
}
