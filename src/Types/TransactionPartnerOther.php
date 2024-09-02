<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

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
    public const TYPE = 'other';

    public function __construct(
        string $type = self::TYPE,
    ) {
        parent::__construct([
            'type' => $type,
        ]);
    }

    protected function boot(): void
    {
        $this->fields = [
            'type' => FieldType::single('string'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
