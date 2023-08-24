<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Represents a chat member that has no additional privileges or restrictions.
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
