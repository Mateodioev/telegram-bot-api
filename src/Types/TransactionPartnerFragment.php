<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;
use Mateodioev\Bots\Telegram\Config\FieldsStorage;

/**
 * Describes a withdrawal transaction with Fragment.
 *
 * @property string $type Type of the transaction partner, always "fragment"
 * @property RevenueWithdrawalState|null $withdrawal_state Optional. State of the transaction if the transaction is outgoing
 *
 * @method string type()
 * @method RevenueWithdrawalState|null withdrawalState()
 *
 * @method static setType(string $type)
 * @method static setWithdrawalState(RevenueWithdrawalState|null $withdrawalState)
 *
 * @see https://core.telegram.org/bots/api#transactionpartnerfragment
 */
class TransactionPartnerFragment extends TransactionPartner
{
    protected function boot(): void
    {
        $this->fields = [
            'type'             => FieldType::single('string'),
            'withdrawal_state' => FieldType::optional(RevenueWithdrawalState::class),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }

    public static function default(): static
    {
        return (new static())->setType('fragment');
    }
}
