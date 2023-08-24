<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Represents a chat member that was banned in the chat and can't return to the chat or view chat messages.
 *
 * @see https://core.telegram.org/bots/api#chatmemberbanned
 */
class ChatMemberBanned extends ChatMember
{
    protected function boot(): void
    {
        $this->fields = [
            'status'     => FieldType::single('string'),
            'user'       => FieldType::single(User::class),
            'until_date' => FieldType::single('integer'),
        ];
    }
}
