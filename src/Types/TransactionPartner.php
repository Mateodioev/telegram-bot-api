<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldsStorage;
use Mateodioev\Bots\Telegram\Exception\TelegramParamException;

/**
 * This object describes the source of a transaction, or its recipient for outgoing transactions. Currently, it can be one of
 * - TransactionPartnerUser
 * - TransactionPartnerFragment
 * - TransactionPartnerTelegramAds
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
            TransactionPartnerUser::class,
            TransactionPartnerFragment::class,
            TransactionPartnerTelegramAds::class,
            TransactionPartnerOther::class,
        ];
    }

    public static function selectChild(array $update): string
    {
        if (isset($update['type']) === false) {
            TelegramParamException::missingField(static::class, 'type');
        }

        return match ($update['type']) {
            TransactionPartnerUser::TYPE => TransactionPartnerUser::class,
            TransactionPartnerFragment::TYPE => TransactionPartnerFragment::class,
            TransactionPartnerTelegramAds::TYPE => TransactionPartnerTelegramAds::class,
            TransactionPartnerOther::TYPE => TransactionPartnerOther::class,
            default => TelegramParamException::invalidType(static::class, (string) $update['type']),
        };
    }
}
