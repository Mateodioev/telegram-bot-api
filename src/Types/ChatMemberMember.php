<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * Represents a [chat member](https://core.telegram.org/bots/api#chatmember) that has no edditional privileges or restrictions
 * 
 * @property string $status The member's status in the chat, always “member”
 * @property User   $user   Information about the user
 * 
 * @method string status()
 * @method User   user()
 * 
 * @method static setStatus(string $status)
 * @method static setUser(User $user)
 * 
 * @see https://core.telegram.org/bots/api#chatmembermember
 */
class ChatMemberMember extends ChatMember
{
    protected array $fields = [
        'status' => 'string',
        'user'   => User::class,
    ];
}
