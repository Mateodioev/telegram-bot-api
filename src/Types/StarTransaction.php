<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Describes a Telegram Star transaction.
 *
 * @property string $id Unique identifier of the transaction. Coincides with the identifer of the original transaction for refund transactions. Coincides with SuccessfulPayment.telegram_payment_charge_id for successful incoming payments from users.
 * @property int $amount Number of Telegram Stars transferred by the transaction
 * @property int $date Date the transaction was created in Unix time
 * @property TransactionPartner|null $source Optional. Source of an incoming transaction (e.g., a user purchasing goods or services, Fragment refunding a failed withdrawal). Only for incoming transactions
 * @property TransactionPartner|null $receiver Optional. Receiver of an outgoing transaction (e.g., a user for a purchase refund, Fragment for a withdrawal). Only for outgoing transactions
 *
 * @method string id()
 * @method int amount()
 * @method int date()
 * @method TransactionPartner|null source()
 * @method TransactionPartner|null receiver()
 *
 * @method static setId(string $id)
 * @method static setAmount(int $amount)
 * @method static setDate(int $date)
 * @method static setSource(TransactionPartner|null $source)
 * @method static setReceiver(TransactionPartner|null $receiver)
 *
 * @see https://core.telegram.org/bots/api#startransaction
 */
class StarTransaction extends abstractType
{
    public function __construct(
        string $id,
        int $amount,
        int $date,
        ?TransactionPartner $source = null,
        ?TransactionPartner $receiver = null,
    ) {
        parent::__construct([
            'id'       => $id,
            'amount'   => $amount,
            'date'     => $date,
            'source'   => $source,
            'receiver' => $receiver,
        ]);
    }

    protected function boot(): void
    {
        $this->fields = [
            'id'       => FieldType::single('string'),
            'amount'   => FieldType::single('integer'),
            'date'     => FieldType::single('integer'),
            'source'   => FieldType::optional(TransactionPartner::class),
            'receiver' => FieldType::optional(TransactionPartner::class),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
