<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Describes a service message about the approval of a suggested post.
 *
 * @property Message|null $suggested_post_message Optional. Message containing the suggested post. Note that the Message object in this field will not contain the reply_to_message field even if it itself is a reply.
 * @property SuggestedPostPrice|null $price Optional. Amount paid for the post
 * @property int $send_date Date when the post will be published
 *
 * @method Message|null suggestedPostMessage()
 * @method SuggestedPostPrice|null price()
 * @method int sendDate()
 *
 * @method static setSuggestedPostMessage(Message|null $suggestedPostMessage)
 * @method static setPrice(SuggestedPostPrice|null $price)
 * @method static setSendDate(int $sendDate)
 *
 * @see https://core.telegram.org/bots/api#suggestedpostapproved
 */
class SuggestedPostApproved extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'suggested_post_message' => FieldType::optional(Message::class),
            'price'                  => FieldType::optional(SuggestedPostPrice::class),
            'send_date'              => FieldType::single('integer'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
