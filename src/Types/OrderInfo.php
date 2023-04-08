<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * This object represents information about an order.
 * 
 * @property ?string          $name             Optional. User name
 * @property ?string          $phone_number     Optional. User's phone number
 * @property ?string          $email            Optional. User email
 * @property ?ShippingAddress $shipping_address Optional. User shipping address
 * 
 * @method ?string          name()
 * @method ?string          phoneNumber()
 * @method ?string          email()
 * @method ?ShippingAddress shippingAddress()
 * 
 * @method static setName(string $name)
 * @method static setPhoneNumber(string $phoneNumber)
 * @method static setEmail(string $email)
 * @method static setShippingAddress(ShippingAddress $shippingAddress)
 * 
 * @see https://core.telegram.org/bots/api#orderinfo
 */
class OrderInfo extends baseType
{
    protected array $fields = [
        'name'         => 'string',
        'phone_number' => 'string',
        'email'        => 'string',
        'shipping_address' => ShippingAddress::class,
    ];
}
