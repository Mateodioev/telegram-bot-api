<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents a shipping address.
 *
 * @property string $country_code Two-letter ISO 3166-1 alpha-2 country code
 * @property string $state State, if applicable
 * @property string $city City
 * @property string $street_line1 First line for the address
 * @property string $street_line2 Second line for the address
 * @property string $post_code Address post code
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
 * @method static setStreetLine2(string $streetLine2)
 * @method static setPostCode(string $postCode)
 *
 * @see https://core.telegram.org/bots/api#shippingaddress
 */
class ShippingAddress extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'country_code' => FieldType::single('string'),
            'state'        => FieldType::single('string'),
            'city'         => FieldType::single('string'),
            'street_line1' => FieldType::single('string'),
            'street_line2' => FieldType::single('string'),
            'post_code'    => FieldType::single('string'),
        ];
    }
}
