<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldsStorage;
use Mateodioev\Bots\Telegram\Exception\TelegramParamException;

/**
 * This object describes the source of a transaction, or its recipient for outgoing transactions. Currently, it can be one of
 * - TransactionPartnerFragment
 * - TransactionPartnerUser
 * - TransactionPartnerOther
 *
 * @see https://core.telegram.org/bots/api#transactionpartner
 */
class TransactionPartner extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }

    public static function childs(): array
    {
        return [
            TransactionPartnerFragment::class,
            TransactionPartnerUser::class,
            TransactionPartnerOther::class,
        ];
    }

    public static function selectChild(array $update): string
    {
        if (isset($update['type']) === false) {
            TelegramParamException::missingField(static::class, 'type');
        }

        return match ($update['type']) {
            'fragment' => TransactionPartnerFragment::class,
            'user' => TransactionPartnerUser::class,
            'other' => TransactionPartnerOther::class,
            default => TelegramParamException::invalidType(static::class, (string) $update['type']),
        };
    }
}
