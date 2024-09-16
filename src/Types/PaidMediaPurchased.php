<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * This object contains information about a paid media purchase.
 *
 * @property User $from User who purchased the media
 * @property string $paid_media_payload Bot-specified paid media payload
 *
 * @method User from()
 * @method string paidMediaPayload()
 *
 * @method static setFrom(User $from)
 * @method static setPaidMediaPayload(string $paidMediaPayload)
 *
 * @see https://core.telegram.org/bots/api#paidmediapurchased
 */
class PaidMediaPurchased extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'from'               => FieldType::single(User::class),
            'paid_media_payload' => FieldType::single('string'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
