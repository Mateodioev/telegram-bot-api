<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Contains a list of Telegram Star transactions.
 *
 * @property StarTransaction[] $transactions The list of transactions
 *
 * @method StarTransaction[] transactions()
 *
 * @method static setTransactions(StarTransaction[] $transactions)
 *
 * @see https://core.telegram.org/bots/api#startransactions
 */
class StarTransactions extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'transactions' => FieldType::multiple(StarTransaction::class),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
