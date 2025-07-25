<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Describes a story area pointing to a suggested reaction. Currently, a story can have up to 5 suggested reaction areas.
 *
 * @property string $type Type of the area, always "suggested_reaction"
 * @property ReactionType $reaction_type Type of the reaction
 * @property bool|null $is_dark Optional. Pass True if the reaction area has a dark background
 * @property bool|null $is_flipped Optional. Pass True if reaction area corner is flipped
 *
 * @method string type()
 * @method ReactionType reactionType()
 * @method bool|null isDark()
 * @method bool|null isFlipped()
 *
 * @method static setType(string $type)
 * @method static setReactionType(ReactionType $reactionType)
 * @method static setIsDark(bool|null $isDark)
 * @method static setIsFlipped(bool|null $isFlipped)
 *
 * @see https://core.telegram.org/bots/api#storyareatypesuggestedreaction
 */
class StoryAreaTypeSuggestedReaction extends StoryAreaType
{
    protected function boot(): void
    {
        $this->fields = [
            'type'          => FieldType::single('string'),
            'reaction_type' => FieldType::single(ReactionType::class),
            'is_dark'       => FieldType::optional('boolean'),
            'is_flipped'    => FieldType::optional('boolean'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }

    public static function default(): static
    {
        return (new static())
            ->setType('suggested_reaction');
    }
}
