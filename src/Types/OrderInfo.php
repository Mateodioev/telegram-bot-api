<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents information about an order.
 *
 * @property string|null $name Optional. User name
 * @property string|null $phone_number Optional. User's phone number
 * @property string|null $email Optional. User email
 * @property ShippingAddress|null $shipping_address Optional. User shipping address
 *
 * @method string|null name()
 * @method string|null phoneNumber()
 * @method string|null email()
 * @method ShippingAddress|null shippingAddress()
 *
 * @method static setName(string|null $name)
 * @method static setPhoneNumber(string|null $phoneNumber)
 * @method static setEmail(string|null $email)
 * @method static setShippingAddress(ShippingAddress|null $shippingAddress)
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
