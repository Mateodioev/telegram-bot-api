<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Represents a join request sent to a chat.
 *
 * @see https://core.telegram.org/bots/api#chatjoinrequest
 */
class ChatJoinRequest extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'chat'         => FieldType::single(Chat::class),
            'from'         => FieldType::single(User::class),
            'user_chat_id' => FieldType::single('integer'),
            'date'         => FieldType::single('integer'),
            'bio'          => FieldType::optional('string'),
            'invite_link'  => FieldType::optional(ChatInviteLink::class),
        ];
    }
}
