<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Represents the content of a location message to be sent as the result of an inline query.
 *
 * @property double $latitude Latitude of the location in degrees
 * @property double $longitude Longitude of the location in degrees
 * @property double|null $horizontal_accuracy Optional. The radius of uncertainty for the location, measured in meters; 0-1500
 * @property int|null $live_period Optional. Period in seconds for which the location can be updated, should be between 60 and 86400.
 * @property int|null $heading Optional. For live locations, a direction in which the user is moving, in degrees. Must be between 1 and 360 if specified.
 * @property int|null $proximity_alert_radius Optional. For live locations, a maximum distance for proximity alerts about approaching another chat member, in meters. Must be between 1 and 100000 if specified.
 *
 * @method double latitude()
 * @method double longitude()
 * @method double|null horizontalAccuracy()
 * @method int|null livePeriod()
 * @method int|null heading()
 * @method int|null proximityAlertRadius()
 *
 * @method static setLatitude(double $latitude)
 * @method static setLongitude(double $longitude)
 * @method static setHorizontalAccuracy(double|null $horizontalAccuracy)
 * @method static setLivePeriod(int|null $livePeriod)
 * @method static setHeading(int|null $heading)
 * @method static setProximityAlertRadius(int|null $proximityAlertRadius)
 *
 * @see https://core.telegram.org/bots/api#inputlocationmessagecontent
 */
class InputLocationMessageContent extends InputMessageContent
{
    protected function boot(): void
    {
        $this->fields = [
            'latitude'               => FieldType::single('double'),
            'longitude'              => FieldType::single('double'),
            'horizontal_accuracy'    => FieldType::optional('double'),
            'live_period'            => FieldType::optional('integer'),
            'heading'                => FieldType::optional('integer'),
            'proximity_alert_radius' => FieldType::optional('integer'),
        ];
    }
}
