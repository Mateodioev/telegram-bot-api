<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Describes a transaction with an unknown source or recipient.
 *
 * @property string $type Type of the transaction partner, always "other"
 *
 * @method string type()
 *
 * @method static setType(string $type)
 *
 * @see https://core.telegram.org/bots/api#transactionpartnerother
 */
class TransactionPartnerOther extends TransactionPartner
{
    protected function boot(): void
    {
        if ($this->fields !== null) {
            // Already booted
            return;
        }
        $this->fields = [
            'type' => FieldType::single('string'),
        ];
    }

    public static function default(): static
    {
        return (new static())->setType('other');
    }
}
