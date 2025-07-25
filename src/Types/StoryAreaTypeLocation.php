<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Describes a story area pointing to a location. Currently, a story can have up to 10 location areas.
 *
 * @property string $type Type of the area, always "location"
 * @property double $latitude Location latitude in degrees
 * @property double $longitude Location longitude in degrees
 * @property LocationAddress|null $address Optional. Address of the location
 *
 * @method string type()
 * @method double latitude()
 * @method double longitude()
 * @method LocationAddress|null address()
 *
 * @method static setType(string $type)
 * @method static setLatitude(double $latitude)
 * @method static setLongitude(double $longitude)
 * @method static setAddress(LocationAddress|null $address)
 *
 * @see https://core.telegram.org/bots/api#storyareatypelocation
 */
class StoryAreaTypeLocation extends StoryAreaType
{
    protected function boot(): void
    {
        $this->fields = [
            'type'      => FieldType::single('string'),
            'latitude'  => FieldType::single('double'),
            'longitude' => FieldType::single('double'),
            'address'   => FieldType::optional(LocationAddress::class),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }

    public static function default(): static
    {
        return (new static())
            ->setType('location');
    }
}
