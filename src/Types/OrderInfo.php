<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents information about an order.
 *
 * @property ?string $name Optional. User name
 * @property ?string $phone_number Optional. User's phone number
 * @property ?string $email Optional. User email
 * @property ?ShippingAddress $shipping_address Optional. User shipping address
 *
 * @method ?string name()
 * @method ?string phoneNumber()
 * @method ?string email()
 * @method ?ShippingAddress shippingAddress()
 *
 * @method static setName(?string $name)
 * @method static setPhoneNumber(?string $phoneNumber)
 * @method static setEmail(?string $email)
 * @method static setShippingAddress(?ShippingAddress $shippingAddress)
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
