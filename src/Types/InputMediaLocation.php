<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Represents a location to be sent.
 *
 * @property string $type Type of the result, must be location
 * @property double $latitude Latitude of the location
 * @property double $longitude Longitude of the location
 * @property double|null $horizontal_accuracy Optional. The radius of uncertainty for the location, measured in meters; 0-1500
 *
 * @method string type()
 * @method double latitude()
 * @method double longitude()
 * @method double|null horizontalAccuracy()
 *
 * @method static setType(string $type)
 * @method static setLatitude(double $latitude)
 * @method static setLongitude(double $longitude)
 * @method static setHorizontalAccuracy(double|null $horizontalAccuracy)
 *
 * @see https://core.telegram.org/bots/api#inputmedialocation
 */
class InputMediaLocation extends InputPollMedia
{
    protected function boot(): void
    {
        $this->fields = [
            'type'                => FieldType::single('string'),
            'latitude'            => FieldType::single('double'),
            'longitude'           => FieldType::single('double'),
            'horizontal_accuracy' => FieldType::optional('double'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }

    public static function default(): static
    {
        return (new static())
            ->setType('location');
    }
}
