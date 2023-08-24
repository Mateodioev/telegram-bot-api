<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Represents a chat member that isn't currently a member of the chat, but may join it themselves.
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
