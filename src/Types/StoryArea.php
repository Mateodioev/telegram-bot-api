<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Describes a clickable area on a story media.
 *
 * @property StoryAreaPosition $position Position of the area
 * @property StoryAreaType $type Type of the area
 *
 * @method StoryAreaPosition position()
 * @method StoryAreaType type()
 *
 * @method static setPosition(StoryAreaPosition $position)
 * @method static setType(StoryAreaType $type)
 *
 * @see https://core.telegram.org/bots/api#storyarea
 */
class StoryArea extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'position' => FieldType::single(StoryAreaPosition::class),
            'type'     => FieldType::single(StoryAreaType::class),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
