<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

/**
 * This object describes the type of a reaction. Currently, it can be one of
 * - ReactionTypeEmoji
 * - ReactionTypeCustomEmoji
 *
 * @see https://core.telegram.org/bots/api#reactiontype
 */
class ReactionType extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [

        ];
    }

    public static function childs(): array
    {
        return [
            ReactionTypeEmoji::class,
            ReactionTypeCustomEmoji::class,
        ];
    }
}
