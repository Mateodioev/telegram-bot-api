<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * Represents a [chat member](https://core.telegram.org/bots/api#chatmember) that isn't currently a member of the chat, but may join it themselves.
 * 
 * @property string $status The member's status in the chat, always “left”
 * @property User   $user Information about the user
 * 
 * @method string status()
 * @method User   user()
 * 
 * @method static setStatus(string $status)
 * @method static setUser(User $user)
 * 
 * @see https://core.telegram.org/bots/api#chatmemberleft
 */
class ChatMemberLeft extends ChatMember
{
    protected array $fields = [
        'status' => 'string',
        'user'   => User::class,
    ];
}
