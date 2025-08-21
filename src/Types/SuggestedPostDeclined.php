<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Describes a service message about the rejection of a suggested post.
 *
 * @property Message|null $suggested_post_message Optional. Message containing the suggested post. Note that the Message object in this field will not contain the reply_to_message field even if it itself is a reply.
 * @property string|null $comment Optional. Comment with which the post was declined
 *
 * @method Message|null suggestedPostMessage()
 * @method string|null comment()
 *
 * @method static setSuggestedPostMessage(Message|null $suggestedPostMessage)
 * @method static setComment(string|null $comment)
 *
 * @see https://core.telegram.org/bots/api#suggestedpostdeclined
 */
class SuggestedPostDeclined extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'suggested_post_message' => FieldType::optional(Message::class),
            'comment'                => FieldType::optional('string'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
