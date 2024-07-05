<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Describes a transaction with a user.
 *
 * @property string $type Type of the transaction partner, always "user"
 * @property User $user Information about the user
 * @property string|null $invoice_payload Optional. Bot-specified invoice payload
 *
 * @method string type()
 * @method User user()
 * @method string|null invoicePayload()
 *
 * @method static setType(string $type)
 * @method static setUser(User $user)
 * @method static setInvoicePayload(string|null $invoicePayload)
 *
 * @see https://core.telegram.org/bots/api#transactionpartneruser
 */
class TransactionPartnerUser extends TransactionPartner
{
    protected function boot(): void
    {
        $this->fields = [
            'type'            => FieldType::single('string'),
            'user'            => FieldType::single(User::class),
            'invoice_payload' => FieldType::optional('string'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }

    public static function default(): static
    {
        return (new static())->setType('user');
    }
}
