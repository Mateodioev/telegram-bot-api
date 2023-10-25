<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Represents a chat member that isn't currently a member of the chat, but may join it themselves.
 *
 * @property string $status The member's status in the chat, always "left"
 * @property User $user Information about the user
 *
 * @method string status()
 * @method User user()
 *
 * @method static setStatus(string $status)
 * @method static setUser(User $user)
 *
 * @see https://core.telegram.org/bots/api#chatmemberleft
 */
class ChatMemberLeft extends ChatMember
{
    protected function boot(): void
    {
        $this->fields = [
            'status' => FieldType::single('string'),
            'user'   => FieldType::single(User::class),
        ];
    }
}
