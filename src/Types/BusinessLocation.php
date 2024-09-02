<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Contains information about the location of a Telegram Business account.
 *
 * @property string $address Address of the business
 * @property Location|null $location Optional. Location of the business
 *
 * @method string address()
 * @method Location|null location()
 *
 * @method static setAddress(string $address)
 * @method static setLocation(Location|null $location)
 *
 * @see https://core.telegram.org/bots/api#businesslocation
 */
class BusinessLocation extends abstractType
{
    public function __construct(
        string $address,
        ?Location $location = null,
    ) {
        parent::__construct([
            'address'  => $address,
            'location' => $location,
        ]);
    }

    protected function boot(): void
    {
        $this->fields = [
            'address'  => FieldType::single('string'),
            'location' => FieldType::optional(Location::class),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
