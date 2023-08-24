<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents a point on the map.
 *
 * @property double $longitude Longitude as defined by sender
 * @property double $latitude Latitude as defined by sender
 * @property ?double $horizontal_accuracy Optional. The radius of uncertainty for the location, measured in meters; 0-1500
 * @property ?int $live_period Optional. Time relative to the message sending date, during which the location can be updated; in seconds. For active live locations only.
 * @property ?int $heading Optional. The direction in which user is moving, in degrees; 1-360. For active live locations only.
 * @property ?int $proximity_alert_radius Optional. The maximum distance for proximity alerts about approaching another chat member, in meters. For sent live locations only.
 *
 * @method double longitude()
 * @method double latitude()
 * @method ?double horizontalAccuracy()
 * @method ?int livePeriod()
 * @method ?int heading()
 * @method ?int proximityAlertRadius()
 *
 * @method static setLongitude(double $longitude)
 * @method static setLatitude(double $latitude)
 * @method static setHorizontalAccuracy(?double $horizontalAccuracy)
 * @method static setLivePeriod(?int $livePeriod)
 * @method static setHeading(?int $heading)
 * @method static setProximityAlertRadius(?int $proximityAlertRadius)
 *
 * @see https://core.telegram.org/bots/api#location
 */
class Location extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'longitude'              => FieldType::single('double'),
            'latitude'               => FieldType::single('double'),
            'horizontal_accuracy'    => FieldType::optional('double'),
            'live_period'            => FieldType::optional('integer'),
            'heading'                => FieldType::optional('integer'),
            'proximity_alert_radius' => FieldType::optional('integer'),
        ];
    }
}
