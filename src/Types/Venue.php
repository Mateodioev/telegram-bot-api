<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * This object represents a venue.
 * 
 * @property Location  $location          Venue location. Can't be a live location
 * @property string    $title             Name of the venue
 * @property string    $address           Address of the venue
 * @property ?string   $foursquare_id     Optional. Foursquare identifier of the venue
 * @property ?string   $foursquare_type   Optional. Foursquare type of the venue. (For example, “arts_entertainment/default”, “arts_entertainment/aquarium” or “food/icecream”.)
 * @property ?string   $google_place_id   Optional. Google Places identifier of the venue
 * @property ?string   $google_place_type Optional. Google Places type of the venue. (See [supported types](https://developers.google.com/places/web-service/supported_types).)
 * 
 * @method Location  location()
 * @method string    title()
 * @method string    address()
 * @method ?string   foursquareId()
 * @method ?string   foursquareType()
 * @method ?string   googlePlaceId()
 * @method ?string   googlePlaceType()
 * 
 * @method static setLocation(Location $location)
 * @method static setTitle(string $title)
 * @method static setAddress(string $address)
 * @method static setFoursquareId(string $foursquareId)
 * @method static setFoursquareType(string $foursquareType)
 * @method static setGooglePlaceId(string $googlePlaceId)
 * @method static setGooglePlaceType(string $googlePlaceType)
 * 
 * @see https://core.telegram.org/bots/api#venue
 */
class Venue extends baseType
{
    protected array $fields = [
        'location'          => Location::class,
        'title'             => 'string',
        'address'           => 'string',
        'foursquare_id'     => 'string',
        'foursquare_type'   => 'string',
        'google_place_id'   => 'string',
        'google_place_type' => 'string',
    ];
}
