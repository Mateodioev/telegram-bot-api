<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldsStorage;
use Mateodioev\Bots\Telegram\Exception\TelegramParamException;

/**
 * This object describes a gift received and owned by a user or a chat. Currently, it can be one of
 * - OwnedGiftRegular
 * - OwnedGiftUnique
 *
 * @see https://core.telegram.org/bots/api#ownedgift
 */
class OwnedGift extends abstractType
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
            OwnedGiftRegular::class,
            OwnedGiftUnique::class,
        ];
    }

    public static function selectChild(array $update): string
    {
        if (isset($update['type']) === false) {
            throw TelegramParamException::missingField(static::class, 'type');
        }

        return match ($update['type']) {
            'regular' => OwnedGiftRegular::class,
            'unique' => OwnedGiftUnique::class,
            default => throw TelegramParamException::invalidType(static::class, (string) $update['type']),
        };
    }
}
