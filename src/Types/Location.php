<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents a point on the map.
 *
 * @property double $longitude Longitude as defined by sender
 * @property double $latitude Latitude as defined by sender
 * @property double|null $horizontal_accuracy Optional. The radius of uncertainty for the location, measured in meters; 0-1500
 * @property int|null $live_period Optional. Time relative to the message sending date, during which the location can be updated; in seconds. For active live locations only.
 * @property int|null $heading Optional. The direction in which user is moving, in degrees; 1-360. For active live locations only.
 * @property int|null $proximity_alert_radius Optional. The maximum distance for proximity alerts about approaching another chat member, in meters. For sent live locations only.
 *
 * @method double longitude()
 * @method double latitude()
 * @method double|null horizontalAccuracy()
 * @method int|null livePeriod()
 * @method int|null heading()
 * @method int|null proximityAlertRadius()
 *
 * @method static setLongitude(double $longitude)
 * @method static setLatitude(double $latitude)
 * @method static setHorizontalAccuracy(double|null $horizontalAccuracy)
 * @method static setLivePeriod(int|null $livePeriod)
 * @method static setHeading(int|null $heading)
 * @method static setProximityAlertRadius(int|null $proximityAlertRadius)
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
