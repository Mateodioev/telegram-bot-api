<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * This object contains basic information about a successful payment. Note that if the buyer initiates a chargeback with the relevant payment provider following this transaction, the funds may be debited from your balance. This is outside of Telegram's control.
 *
 * @property string $currency Three-letter ISO 4217 currency code, or "XTR" for payments in Telegram Stars
 * @property int $total_amount Total price in the smallest units of the currency (integer, not float/double). For example, for a price of US$ 1.45 pass amount = 145. See the exp parameter in currencies.json, it shows the number of digits past the decimal point for each currency (2 for the majority of currencies).
 * @property string $invoice_payload Bot-specified invoice payload
 * @property int|null $subscription_expiration_date Optional. Expiration date of the subscription, in Unix time; for recurring payments only
 * @property bool|null $is_recurring Optional. True, if the payment is a recurring payment for a subscription
 * @property bool|null $is_first_recurring Optional. True, if the payment is the first payment for a subscription
 * @property string|null $shipping_option_id Optional. Identifier of the shipping option chosen by the user
 * @property OrderInfo|null $order_info Optional. Order information provided by the user
 * @property string $telegram_payment_charge_id Telegram payment identifier
 * @property string $provider_payment_charge_id Provider payment identifier
 *
 * @method string currency()
 * @method int totalAmount()
 * @method string invoicePayload()
 * @method int|null subscriptionExpirationDate()
 * @method bool|null isRecurring()
 * @method bool|null isFirstRecurring()
 * @method string|null shippingOptionId()
 * @method OrderInfo|null orderInfo()
 * @method string telegramPaymentChargeId()
 * @method string providerPaymentChargeId()
 *
 * @method static setCurrency(string $currency)
 * @method static setTotalAmount(int $totalAmount)
 * @method static setInvoicePayload(string $invoicePayload)
 * @method static setSubscriptionExpirationDate(int|null $subscriptionExpirationDate)
 * @method static setIsRecurring(bool|null $isRecurring)
 * @method static setIsFirstRecurring(bool|null $isFirstRecurring)
 * @method static setShippingOptionId(string|null $shippingOptionId)
 * @method static setOrderInfo(OrderInfo|null $orderInfo)
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
            'currency'                     => FieldType::single('string'),
            'total_amount'                 => FieldType::single('integer'),
            'invoice_payload'              => FieldType::single('string'),
            'subscription_expiration_date' => FieldType::optional('integer'),
            'is_recurring'                 => FieldType::optional('boolean'),
            'is_first_recurring'           => FieldType::optional('boolean'),
            'shipping_option_id'           => FieldType::optional('string'),
            'order_info'                   => FieldType::optional(OrderInfo::class),
            'telegram_payment_charge_id'   => FieldType::single('string'),
            'provider_payment_charge_id'   => FieldType::single('string'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
