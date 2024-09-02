<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * This object contains basic information about a refunded payment.
 *
 * @property string $currency Three-letter ISO 4217 currency code, or "XTR" for payments in Telegram Stars. Currently, always "XTR"
 * @property int $total_amount Total refunded price in the smallest units of the currency (integer, not float/double). For example, for a price of US$ 1.45, total_amount = 145. See the exp parameter in currencies.json, it shows the number of digits past the decimal point for each currency (2 for the majority of currencies).
 * @property string $invoice_payload Bot-specified invoice payload
 * @property string $telegram_payment_charge_id Telegram payment identifier
 * @property string|null $provider_payment_charge_id Optional. Provider payment identifier
 *
 * @method string currency()
 * @method int totalAmount()
 * @method string invoicePayload()
 * @method string telegramPaymentChargeId()
 * @method string|null providerPaymentChargeId()
 *
 * @method static setCurrency(string $currency)
 * @method static setTotalAmount(int $totalAmount)
 * @method static setInvoicePayload(string $invoicePayload)
 * @method static setTelegramPaymentChargeId(string $telegramPaymentChargeId)
 * @method static setProviderPaymentChargeId(string|null $providerPaymentChargeId)
 *
 * @see https://core.telegram.org/bots/api#refundedpayment
 */
class RefundedPayment extends abstractType
{
    public function __construct(
        string $currency,
        int $total_amount,
        string $invoice_payload,
        string $telegram_payment_charge_id,
        ?string $provider_payment_charge_id = null,
    ) {
        parent::__construct([
            'currency'                   => $currency,
            'total_amount'               => $total_amount,
            'invoice_payload'            => $invoice_payload,
            'telegram_payment_charge_id' => $telegram_payment_charge_id,
            'provider_payment_charge_id' => $provider_payment_charge_id,
        ]);
    }

    protected function boot(): void
    {
        $this->fields = [
            'currency'                   => FieldType::single('string'),
            'total_amount'               => FieldType::single('integer'),
            'invoice_payload'            => FieldType::single('string'),
            'telegram_payment_charge_id' => FieldType::single('string'),
            'provider_payment_charge_id' => FieldType::optional('string'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
