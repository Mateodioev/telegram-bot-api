<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object contains information about an incoming pre-checkout query.
 *
 * @property string $id Unique query identifier
 * @property User $from User who sent the query
 * @property string $currency Three-letter ISO 4217 currency code
 * @property int $total_amount Total price in the smallest units of the currency (integer, not float/double). For example, for a price of US$ 1.45 pass amount = 145. See the exp parameter in currencies.json, it shows the number of digits past the decimal point for each currency (2 for the majority of currencies).
 * @property string $invoice_payload Bot specified invoice payload
 * @property string|null $shipping_option_id Optional. Identifier of the shipping option chosen by the user
 * @property OrderInfo|null $order_info Optional. Order information provided by the user
 *
 * @method string id()
 * @method User from()
 * @method string currency()
 * @method int totalAmount()
 * @method string invoicePayload()
 * @method string|null shippingOptionId()
 * @method OrderInfo|null orderInfo()
 *
 * @method static setId(string $id)
 * @method static setFrom(User $from)
 * @method static setCurrency(string $currency)
 * @method static setTotalAmount(int $totalAmount)
 * @method static setInvoicePayload(string $invoicePayload)
 * @method static setShippingOptionId(string|null $shippingOptionId)
 * @method static setOrderInfo(OrderInfo|null $orderInfo)
 *
 * @see https://core.telegram.org/bots/api#precheckoutquery
 */
class PreCheckoutQuery extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'id'                 => FieldType::single('string'),
            'from'               => FieldType::single(User::class),
            'currency'           => FieldType::single('string'),
            'total_amount'       => FieldType::single('integer'),
            'invoice_payload'    => FieldType::single('string'),
            'shipping_option_id' => FieldType::optional('string'),
            'order_info'         => FieldType::optional(OrderInfo::class),
        ];
    }
}
