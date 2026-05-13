<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldsStorage;
use Mateodioev\Bots\Telegram\Exception\TelegramParamException;

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

    public static function selectChild(array $update): string
    {
        if (isset($update['type']) === false) {
            throw TelegramParamException::missingField(static::class, 'type');
        }

        return match ($update['type']) {
            'emoji' => ReactionTypeEmoji::class,
            'custom_emoji' => ReactionTypeCustomEmoji::class,
            'paid' => ReactionTypePaid::class,
            default => throw TelegramParamException::invalidType(static::class, (string) $update['type']),
        };
    }
}
