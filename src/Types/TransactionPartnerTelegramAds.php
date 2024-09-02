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
    public const TYPE = 'telegram_ads';

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
