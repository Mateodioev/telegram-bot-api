<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * This object represents a point on the map.
 * 
 * @property double   $longitude              Longitude as defined by sender
 * @property double   $latitude               Latitude as defined by sender
 * @property ?double  $horizontal_accuracy    Optional. The radius of uncertainty for the location, measured in meters; 0-1500
 * @property ?integer $live_period            Optional. Time relative to the message sending date, during which the location can be updated; in seconds. For active live locations only.
 * @property ?integer $heading                Optional. The direction in which user is moving, in degrees; 1-360. For active live locations only.
 * @property ?integer $proximity_alert_radius Optional. The maximum distance for proximity alerts about approaching another chat member, in meters. For sent live locations only.
 * 
 * @method double   longitude()
 * @method double   latitude()
 * @method ?double  horizontalAccuracy()
 * @method ?integer livePeriod()
 * @method ?integer heading()
 * @method ?integer proximityAlertRadius()
 * 
 * @method static setLongitude(double $longitude)
 * @method static setLatitude(double $latitude)
 * @method static setHorizontalAccuracy(double $horizontalAccuracy)
 * @method static setLivePeriod(integer $livePeriod)
 * @method static setHeading(integer $heading)
 * @method static setProximityAlertRadius(integer $proximityAlertRadius)
 * 
 * @see https://core.telegram.org/bots/api#location
 */
class Location extends baseType
{
    protected array $fields = [
        'longitude'              => 'double', // float
        'latitude'               => 'double', // float
        'horizontal_accuracy'    => 'double', // float
        'live_period'            => 'integer',
        'heading'                => 'integer',
        'proximity_alert_radius' => 'integer',
    ];
}
