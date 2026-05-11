<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Represents a venue to be sent.
 *
 * @property string $type Type of the result, must be venue
 * @property double $latitude Latitude of the location
 * @property double $longitude Longitude of the location
 * @property string $title Name of the venue
 * @property string $address Address of the venue
 * @property string|null $foursquare_id Optional. Foursquare identifier of the venue
 * @property string|null $foursquare_type Optional. Foursquare type of the venue, if known. (For example, "arts_entertainment/default", "arts_entertainment/aquarium" or "food/icecream".)
 * @property string|null $google_place_id Optional. Google Places identifier of the venue
 * @property string|null $google_place_type Optional. Google Places type of the venue. (See supported types.)
 *
 * @method string type()
 * @method double latitude()
 * @method double longitude()
 * @method string title()
 * @method string address()
 * @method string|null foursquareId()
 * @method string|null foursquareType()
 * @method string|null googlePlaceId()
 * @method string|null googlePlaceType()
 *
 * @method static setType(string $type)
 * @method static setLatitude(double $latitude)
 * @method static setLongitude(double $longitude)
 * @method static setTitle(string $title)
 * @method static setAddress(string $address)
 * @method static setFoursquareId(string|null $foursquareId)
 * @method static setFoursquareType(string|null $foursquareType)
 * @method static setGooglePlaceId(string|null $googlePlaceId)
 * @method static setGooglePlaceType(string|null $googlePlaceType)
 *
 * @see https://core.telegram.org/bots/api#inputmediavenue
 */
class InputMediaVenue extends InputPollMedia
{
    protected function boot(): void
    {
        $this->fields = [
            'type'              => FieldType::single('string'),
            'latitude'          => FieldType::single('double'),
            'longitude'         => FieldType::single('double'),
            'title'             => FieldType::single('string'),
            'address'           => FieldType::single('string'),
            'foursquare_id'     => FieldType::optional('string'),
            'foursquare_type'   => FieldType::optional('string'),
            'google_place_id'   => FieldType::optional('string'),
            'google_place_type' => FieldType::optional('string'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }

    public static function default(): static
    {
        return (new static())
            ->setType('venue');
    }
}
