<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Represents a chat member that owns the chat and has all administrator privileges.
 *
 * @see https://core.telegram.org/bots/api#chatmemberowner
 */
class ChatMemberOwner extends ChatMember
{
    protected function boot(): void
    {
        $this->fields = [
            'status'       => FieldType::single('string'),
            'user'         => FieldType::single(User::class),
            'is_anonymous' => FieldType::single('boolean'),
            'custom_title' => FieldType::optional('string'),
        ];
    }
}
