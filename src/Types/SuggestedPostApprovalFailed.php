<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Describes a service message about the failed approval of a suggested post. Currently, only caused by insufficient user funds at the time of approval.
 *
 * @property Message|null $suggested_post_message Optional. Message containing the suggested post whose approval has failed. Note that the Message object in this field will not contain the reply_to_message field even if it itself is a reply.
 * @property SuggestedPostPrice $price Expected price of the post
 *
 * @method Message|null suggestedPostMessage()
 * @method SuggestedPostPrice price()
 *
 * @method static setSuggestedPostMessage(Message|null $suggestedPostMessage)
 * @method static setPrice(SuggestedPostPrice $price)
 *
 * @see https://core.telegram.org/bots/api#suggestedpostapprovalfailed
 */
class SuggestedPostApprovalFailed extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'suggested_post_message' => FieldType::optional(Message::class),
            'price'                  => FieldType::single(SuggestedPostPrice::class),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
