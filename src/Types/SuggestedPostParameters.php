<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Contains parameters of a post that is being suggested by the bot.
 *
 * @property SuggestedPostPrice|null $price Optional. Proposed price for the post. If the field is omitted, then the post is unpaid.
 * @property int|null $send_date Optional. Proposed send date of the post. If specified, then the date must be between 300 second and 2678400 seconds (30 days) in the future. If the field is omitted, then the post can be published at any time within 30 days at the sole discretion of the user who approves it.
 *
 * @method SuggestedPostPrice|null price()
 * @method int|null sendDate()
 *
 * @method static setPrice(SuggestedPostPrice|null $price)
 * @method static setSendDate(int|null $sendDate)
 *
 * @see https://core.telegram.org/bots/api#suggestedpostparameters
 */
class SuggestedPostParameters extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'price'     => FieldType::optional(SuggestedPostPrice::class),
            'send_date' => FieldType::optional('integer'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
