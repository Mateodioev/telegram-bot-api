<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object contains basic information about a successful payment.
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
