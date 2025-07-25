<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Describes a story area containing weather information. Currently, a story can have up to 3 weather areas.
 *
 * @property string $type Type of the area, always "weather"
 * @property double $temperature Temperature, in degree Celsius
 * @property string $emoji Emoji representing the weather
 * @property int $background_color A color of the area background in the ARGB format
 *
 * @method string type()
 * @method double temperature()
 * @method string emoji()
 * @method int backgroundColor()
 *
 * @method static setType(string $type)
 * @method static setTemperature(double $temperature)
 * @method static setEmoji(string $emoji)
 * @method static setBackgroundColor(int $backgroundColor)
 *
 * @see https://core.telegram.org/bots/api#storyareatypeweather
 */
class StoryAreaTypeWeather extends StoryAreaType
{
    protected function boot(): void
    {
        $this->fields = [
            'type'             => FieldType::single('string'),
            'temperature'      => FieldType::single('double'),
            'emoji'            => FieldType::single('string'),
            'background_color' => FieldType::single('integer'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }

    public static function default(): static
    {
        return (new static())
            ->setType('weather');
    }
}
