<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Represents a chat member that owns the chat and has all administrator privileges.
 *
 * @property string $status The member's status in the chat, always "creator"
 * @property User $user Information about the user
 * @property bool $is_anonymous True, if the user's presence in the chat is hidden
 * @property string|null $custom_title Optional. Custom title for this user
 *
 * @method string status()
 * @method User user()
 * @method bool isAnonymous()
 * @method string|null customTitle()
 *
 * @method static setStatus(string $status)
 * @method static setUser(User $user)
 * @method static setIsAnonymous(bool $isAnonymous)
 * @method static setCustomTitle(string|null $customTitle)
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
