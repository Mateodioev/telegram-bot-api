<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object contains information about an incoming pre-checkout query.
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
