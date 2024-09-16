<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Represents a chat member that has no additional privileges or restrictions.
 *
 * @property string $status The member's status in the chat, always "member"
 * @property User $user Information about the user
 * @property int|null $until_date Optional. Date when the user's subscription will expire; Unix time
 *
 * @method string status()
 * @method User user()
 * @method int|null untilDate()
 *
 * @method static setStatus(string $status)
 * @method static setUser(User $user)
 * @method static setUntilDate(int|null $untilDate)
 *
 * @see https://core.telegram.org/bots/api#chatmembermember
 */
class ChatMemberMember extends ChatMember
{
    protected function boot(): void
    {
        $this->fields = [
            'status'     => FieldType::single('string'),
            'user'       => FieldType::single(User::class),
            'until_date' => FieldType::optional('integer'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
