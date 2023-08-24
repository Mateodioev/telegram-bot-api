<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object contains basic information about a successful payment.
 *
 * @property string $currency Three-letter ISO 4217 currency code
 * @property int $total_amount Total price in the smallest units of the currency (integer, not float/double). For example, for a price of US$ 1.45 pass amount = 145. See the exp parameter in currencies.json, it shows the number of digits past the decimal point for each currency (2 for the majority of currencies).
 * @property string $invoice_payload Bot specified invoice payload
 * @property ?string $shipping_option_id Optional. Identifier of the shipping option chosen by the user
 * @property ?OrderInfo $order_info Optional. Order information provided by the user
 * @property string $telegram_payment_charge_id Telegram payment identifier
 * @property string $provider_payment_charge_id Provider payment identifier
 *
 * @method string currency()
 * @method int totalAmount()
 * @method string invoicePayload()
 * @method ?string shippingOptionId()
 * @method ?OrderInfo orderInfo()
 * @method string telegramPaymentChargeId()
 * @method string providerPaymentChargeId()
 *
 * @method static setCurrency(string $currency)
 * @method static setTotalAmount(int $totalAmount)
 * @method static setInvoicePayload(string $invoicePayload)
 * @method static setShippingOptionId(?string $shippingOptionId)
 * @method static setOrderInfo(?OrderInfo $orderInfo)
 * @method static setTelegramPaymentChargeId(string $telegramPaymentChargeId)
 * @method static setProviderPaymentChargeId(string $providerPaymentChargeId)
 *
 * @see https://core.telegram.org/bots/api#successfulpayment
 */
class SuccessfulPayment extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'currency'                   => FieldType::single('string'),
            'total_amount'               => FieldType::single('integer'),
            'invoice_payload'            => FieldType::single('string'),
            'shipping_option_id'         => FieldType::optional('string'),
            'order_info'                 => FieldType::optional(OrderInfo::class),
            'telegram_payment_charge_id' => FieldType::single('string'),
            'provider_payment_charge_id' => FieldType::single('string'),
        ];
    }
}
