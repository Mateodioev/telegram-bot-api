<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Describes a transaction with payment for paid broadcasting.
 *
 * @property string $type Type of the transaction partner, always "telegram_api"
 * @property int $request_count The number of successful requests that exceeded regular limits and were therefore billed
 *
 * @method string type()
 * @method int requestCount()
 *
 * @method static setType(string $type)
 * @method static setRequestCount(int $requestCount)
 *
 * @see https://core.telegram.org/bots/api#transactionpartnertelegramapi
 */
class TransactionPartnerTelegramApi extends TransactionPartner
{
    protected function boot(): void
    {
        $this->fields = [
            'type'          => FieldType::single('string'),
            'request_count' => FieldType::single('integer'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }

    public static function default(): static
    {
        return (new static())
            ->setType('telegram_api');
    }
}
