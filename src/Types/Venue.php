<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents a venue.
 *
 * @see https://core.telegram.org/bots/api#venue
 */
class Venue extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'location'          => FieldType::single(Location::class),
            'title'             => FieldType::single('string'),
            'address'           => FieldType::single('string'),
            'foursquare_id'     => FieldType::optional('string'),
            'foursquare_type'   => FieldType::optional('string'),
            'google_place_id'   => FieldType::optional('string'),
            'google_place_type' => FieldType::optional('string'),
        ];
    }
}
