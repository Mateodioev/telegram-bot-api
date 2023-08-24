<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents information about an order.
 *
 * @see https://core.telegram.org/bots/api#orderinfo
 */
class OrderInfo extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'name'             => FieldType::optional('string'),
            'phone_number'     => FieldType::optional('string'),
            'email'            => FieldType::optional('string'),
            'shipping_address' => FieldType::optional(ShippingAddress::class),
        ];
    }
}
