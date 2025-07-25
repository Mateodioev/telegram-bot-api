<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Describes the physical address of a location.
 *
 * @property string $country_code The two-letter ISO 3166-1 alpha-2 country code of the country where the location is located
 * @property string|null $state Optional. State of the location
 * @property string|null $city Optional. City of the location
 * @property string|null $street Optional. Street address of the location
 *
 * @method string countryCode()
 * @method string|null state()
 * @method string|null city()
 * @method string|null street()
 *
 * @method static setCountryCode(string $countryCode)
 * @method static setState(string|null $state)
 * @method static setCity(string|null $city)
 * @method static setStreet(string|null $street)
 *
 * @see https://core.telegram.org/bots/api#locationaddress
 */
class LocationAddress extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'country_code' => FieldType::single('string'),
            'state'        => FieldType::optional('string'),
            'city'         => FieldType::optional('string'),
            'street'       => FieldType::optional('string'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
