<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Describes a story area pointing to an HTTP or tg:// link. Currently, a story can have up to 3 link areas.
 *
 * @property string $type Type of the area, always "link"
 * @property string $url HTTP or tg:// URL to be opened when the area is clicked
 *
 * @method string type()
 * @method string url()
 *
 * @method static setType(string $type)
 * @method static setUrl(string $url)
 *
 * @see https://core.telegram.org/bots/api#storyareatypelink
 */
class StoryAreaTypeLink extends StoryAreaType
{
    protected function boot(): void
    {
        $this->fields = [
            'type' => FieldType::single('string'),
            'url'  => FieldType::single('string'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }

    public static function default(): static
    {
        return (new static())
            ->setType('link');
    }
}
