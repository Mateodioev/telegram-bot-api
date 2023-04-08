<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * Represents a [chat member](https://core.telegram.org/bots/api#chatmember) that was banned in the chat and can't return to the chat or view chat messages.
 * 
 * @property string  $status The member's status in the chat, always “kicked”
 * @property User    $user Information about the user
 * @property integer $until_date Date when restrictions will be lifted for this user; unix time. If 0, then the user is banned forever
 * 
 * @method string  status()
 * @method User    user()
 * @method integer untilDate()
 * 
 * @method static setStatus(string $status)
 * @method static setUser(User $user)
 * @method static setUntilDate(integer $untilDate)
 * 
 * @see https://core.telegram.org/bots/api#chatmemberbanned
 */
class ChatMemberBanned extends ChatMember
{
    protected array $fields = [
        'status'     => 'string',
        'user'       => User::class,
        'until_date' => 'integer',
    ];
}
