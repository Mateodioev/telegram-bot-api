<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Represents a chat member that was banned in the chat and can't return to the chat or view chat messages.
 *
 * @property string $status The member's status in the chat, always "kicked"
 * @property User $user Information about the user
 * @property int $until_date Date when restrictions will be lifted for this user; Unix time. If 0, then the user is banned forever
 *
 * @method string status()
 * @method User user()
 * @method int untilDate()
 *
 * @method static setStatus(string $status)
 * @method static setUser(User $user)
 * @method static setUntilDate(int $untilDate)
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
