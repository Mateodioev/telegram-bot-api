<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldsStorage;

/**
 * This object describes the type of a reaction. Currently, it can be one of
 * - ReactionTypeEmoji
 * - ReactionTypeCustomEmoji
 * - ReactionTypePaid
 *
 * @see https://core.telegram.org/bots/api#reactiontype
 */
class ReactionType extends abstractType
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
            ReactionTypeEmoji::class,
            ReactionTypeCustomEmoji::class,
            ReactionTypePaid::class,
        ];
    }
}
