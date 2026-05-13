<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldsStorage;
use Mateodioev\Bots\Telegram\Exception\TelegramParamException;

/**
 * Describes the type of a clickable area on a story. Currently, it can be one of
 * - StoryAreaTypeLocation
 * - StoryAreaTypeSuggestedReaction
 * - StoryAreaTypeLink
 * - StoryAreaTypeWeather
 * - StoryAreaTypeUniqueGift
 *
 * @see https://core.telegram.org/bots/api#storyareatype
 */
class StoryAreaType extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [

        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }

    public static function childs(): array
    {
        return [
            StoryAreaTypeLocation::class,
            StoryAreaTypeSuggestedReaction::class,
            StoryAreaTypeLink::class,
            StoryAreaTypeWeather::class,
            StoryAreaTypeUniqueGift::class,
        ];
    }

    public static function selectChild(array $update): string
    {
        if (isset($update['type']) === false) {
            throw TelegramParamException::missingField(static::class, 'type');
        }

        return match ($update['type']) {
            'location'           => StoryAreaTypeLocation::class,
            'suggested_reaction' => StoryAreaTypeSuggestedReaction::class,
            'link'               => StoryAreaTypeLink::class,
            'weather'            => StoryAreaTypeWeather::class,
            'unique_gift'        => StoryAreaTypeUniqueGift::class,
            default              => throw TelegramParamException::invalidType(static::class, (string) $update['type']),
        };
    }
}
