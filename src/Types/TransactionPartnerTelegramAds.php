<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Describes a withdrawal transaction to the Telegram Ads platform.
 *
 * @property string $type Type of the transaction partner, always "telegram_ads"
 *
 * @method string type()
 *
 * @method static setType(string $type)
 *
 * @see https://core.telegram.org/bots/api#transactionpartnertelegramads
 */
class TransactionPartnerTelegramAds extends TransactionPartner
{
    protected function boot(): void
    {
        $this->fields = [
            'type' => FieldType::single('string'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }

    public static function default(): static
    {
        return (new static())->setType('telegram_ads');
    }
}
