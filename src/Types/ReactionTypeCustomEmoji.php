<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * The reaction is based on a custom emoji.
 *
 * @property string $type Type of the reaction, always "custom_emoji"
 * @property string $custom_emoji_id Custom emoji identifier
 *
 * @method string type()
 * @method string customEmojiId()
 *
 * @method static setType(string $type)
 * @method static setCustomEmojiId(string $customEmojiId)
 *
 * @see https://core.telegram.org/bots/api#reactiontypecustomemoji
 */
class ReactionTypeCustomEmoji extends ReactionType
{
    protected function boot(): void
    {
        $this->fields = [
            'type'            => FieldType::single('string'),
            'custom_emoji_id' => FieldType::single('string'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }

    public static function default(): static
    {
        return (new static())
            ->setType('custom_emoji');
    }
}
