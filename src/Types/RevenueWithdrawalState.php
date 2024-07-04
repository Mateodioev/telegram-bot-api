<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldsStorage;
use Mateodioev\Bots\Telegram\Exception\TelegramParamException;

/**
 * This object describes the state of a revenue withdrawal operation. Currently, it can be one of
 * - RevenueWithdrawalStatePending
 * - RevenueWithdrawalStateSucceeded
 * - RevenueWithdrawalStateFailed
 *
 * @see https://core.telegram.org/bots/api#revenuewithdrawalstate
 */
class RevenueWithdrawalState extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }

    public static function childs(): array
    {
        return [
            RevenueWithdrawalStatePending::class,
            RevenueWithdrawalStateSucceeded::class,
            RevenueWithdrawalStateFailed::class,
        ];
    }

    public static function selectChild(array $update): string
    {
        if (isset($update['type']) === false) {
            TelegramParamException::missingField(static::class, 'type');
        }

        return match ($update['type']) {
            'pending' => RevenueWithdrawalStatePending::class,
            'succeeded' => RevenueWithdrawalStateSucceeded::class,
            'failed' => RevenueWithdrawalStateFailed::class,
            default => TelegramParamException::invalidType(static::class, (string) $update['type']),
        };
    }
}
