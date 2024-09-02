<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldsStorage;
use Mateodioev\Bots\Telegram\Exception\TelegramParamException;

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
        $this->fields = [];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }

    public static function childs(): array
    {
        return [
            ReactionTypeEmoji::class,
            ReactionTypeCustomEmoji::class,
        ];
    }

    public static function selectChild(array $update): string
    {
        if (isset($update['type']) === false) {
            throw new TelegramParamException('Missing type field in ReactionType');
        }

        return match ($update['type']) {
            ReactionTypeEmoji::TYPE => ReactionTypeEmoji::class,
            ReactionTypeCustomEmoji::TYPE => ReactionTypeCustomEmoji::class,
            default => throw new TelegramParamException('Invalid type: ' . $update['type'] . ' in ReactionType')
        };
    }
}
