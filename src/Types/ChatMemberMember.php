<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Represents a chat member that has no additional privileges or restrictions.
 *
 * @property string $status The member's status in the chat, always "member"
 * @property User $user Information about the user
 *
 * @method string status()
 * @method User user()
 *
 * @method static setStatus(string $status)
 * @method static setUser(User $user)
 *
 * @see https://core.telegram.org/bots/api#chatmembermember
 */
class ChatMemberMember extends ChatMember
{
    protected function boot(): void
    {
        $this->fields = [
            'status' => FieldType::single('string'),
            'user'   => FieldType::single(User::class),
        ];
    }
}
