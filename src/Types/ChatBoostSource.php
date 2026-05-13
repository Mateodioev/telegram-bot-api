<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldsStorage;
use Mateodioev\Bots\Telegram\Exception\TelegramParamException;

/**
 * This object describes the source of a chat boost. It can be one of
 * - ChatBoostSourcePremium
 * - ChatBoostSourceGiftCode
 * - ChatBoostSourceGiveaway
 *
 * @see https://core.telegram.org/bots/api#chatboostsource
 */
class ChatBoostSource extends abstractType
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
            ChatBoostSourcePremium::class,
            ChatBoostSourceGiftCode::class,
            ChatBoostSourceGiveaway::class,
        ];
    }

    public static function selectChild(array $update): string
    {
        if (isset($update['source']) === false) {
            throw TelegramParamException::missingField(static::class, 'source');
        }

        return match ($update['source']) {
            'premium' => ChatBoostSourcePremium::class,
            'gift_code' => ChatBoostSourceGiftCode::class,
            'giveaway' => ChatBoostSourceGiveaway::class,
            default => throw TelegramParamException::invalidType(static::class, (string) $update['source']),
        };
    }
}
