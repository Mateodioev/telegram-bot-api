<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * This object represents a shipping address.
 * 
 * @property string $country_code Two-letter ISO 3166-1 alpha-2 country code
 * @property string $state        State, if applicable
 * @property string $city         City
 * @property string $street_line1 First line for the address
 * @property string $street_line2 Second line for the address
 * @property string $post_code    Address post code
 * 
 * @method string countryCode()
 * @method string state()
 * @method string city()
 * @method string streetLine1()
 * @method string streetLine2()
 * @method string postCode()
 * 
 * @method static setCountryCode(string $countryCode)
 * @method static setState(string $state)
 * @method static setCity(string $city)
 * @method static setStreetLine1(string $streetLine1)
 * @method static setStreetLine2( $streetLine2)
 * @method static setPostCode(string $postCode)
 * 
 * @see https://core.telegram.org/bots/api#shippingaddress
 */
class ShippingAddress extends baseType
{
    protected array $fields = [
        'country_code' => 'string',
        'state'        => 'string',
        'city'         => 'string',
        'street_line1' => 'string',
        'street_line2' => 'string',
        'post_code'    => 'string',
    ];
}
