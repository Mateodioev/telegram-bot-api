<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Represents the content of a venue message to be sent as the result of an inline query.
 *
 * @property double $latitude Latitude of the venue in degrees
 * @property double $longitude Longitude of the venue in degrees
 * @property string $title Name of the venue
 * @property string $address Address of the venue
 * @property string|null $foursquare_id Optional. Foursquare identifier of the venue, if known
 * @property string|null $foursquare_type Optional. Foursquare type of the venue, if known. (For example, "arts_entertainment/default", "arts_entertainment/aquarium" or "food/icecream".)
 * @property string|null $google_place_id Optional. Google Places identifier of the venue
 * @property string|null $google_place_type Optional. Google Places type of the venue. (See supported types.)
 *
 * @method double latitude()
 * @method double longitude()
 * @method string title()
 * @method string address()
 * @method string|null foursquareId()
 * @method string|null foursquareType()
 * @method string|null googlePlaceId()
 * @method string|null googlePlaceType()
 *
 * @method static setLatitude(double $latitude)
 * @method static setLongitude(double $longitude)
 * @method static setTitle(string $title)
 * @method static setAddress(string $address)
 * @method static setFoursquareId(string|null $foursquareId)
 * @method static setFoursquareType(string|null $foursquareType)
 * @method static setGooglePlaceId(string|null $googlePlaceId)
 * @method static setGooglePlaceType(string|null $googlePlaceType)
 *
 * @see https://core.telegram.org/bots/api#inputvenuemessagecontent
 */
class InputVenueMessageContent extends InputMessageContent
{
    protected function boot(): void
    {
        $this->fields = [
            'latitude'          => FieldType::single('double'),
            'longitude'         => FieldType::single('double'),
            'title'             => FieldType::single('string'),
            'address'           => FieldType::single('string'),
            'foursquare_id'     => FieldType::optional('string'),
            'foursquare_type'   => FieldType::optional('string'),
            'google_place_id'   => FieldType::optional('string'),
            'google_place_type' => FieldType::optional('string'),
        ];
    }
}
