<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * Represents a [chat member](https://core.telegram.org/bots/api#chatmember) that owns the chat and has all administrator privileges.
 * 
 * @property string  $status       The member's status in the chat, always “creator”
 * @property User    $user         Information about the user
 * @property boolean $is_anonymous True, if the user's presence in the chat is hidden
 * @property string  $custom_title Optional. Custom title for this user
 * 
 * @method string  status()
 * @method User    user()
 * @method boolean isAnonymous()
 * @method ?string  customTitle()
 * 
 * @method static setStatus(string $status)
 * @method static setUser(User $user)
 * @method static setIsAnonymous(boolean $isAnonymous)
 * @method static setCustomTitle(string $customTitle)
 * 
 * @see https://core.telegram.org/bots/api#chatmemberowner
 */
class ChatMemberOwner extends ChatMember
{
    protected array $fields = [
        'status'       => 'string',
        'user'         => User::class,
        'is_anonymous' => 'boolean',
        'custom_title' => 'string',
    ];
}
