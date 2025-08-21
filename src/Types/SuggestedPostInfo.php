<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Contains information about a suggested post.
 *
 * @property string $state State of the suggested post. Currently, it can be one of "pending", "approved", "declined".
 * @property SuggestedPostPrice|null $price Optional. Proposed price of the post. If the field is omitted, then the post is unpaid.
 * @property int|null $send_date Optional. Proposed send date of the post. If the field is omitted, then the post can be published at any time within 30 days at the sole discretion of the user or administrator who approves it.
 *
 * @method string state()
 * @method SuggestedPostPrice|null price()
 * @method int|null sendDate()
 *
 * @method static setState(string $state)
 * @method static setPrice(SuggestedPostPrice|null $price)
 * @method static setSendDate(int|null $sendDate)
 *
 * @see https://core.telegram.org/bots/api#suggestedpostinfo
 */
class SuggestedPostInfo extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'state'     => FieldType::single('string'),
            'price'     => FieldType::optional(SuggestedPostPrice::class),
            'send_date' => FieldType::optional('integer'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
