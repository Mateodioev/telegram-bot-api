<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * This object represents changes in the status of a chat member.
 * 
 * @property Chat           $chat                  Chat the user belongs to
 * @property User           $from                  Performer of the action, which resulted in the change
 * @property integer        $date                  Date the change was done in Unix time
 * @property ChatMember     $old_chat_member       Previous information about the chat member
 * @property ChatMember     $new_chat_member       New information about the chat member
 * @property ChatInviteLink $invite_link Optional. Chat invite link, which was used by the user to join the chat; for joining by invite link events only.
 * 
 * @method Chat chat()
 * @method User from()
 * @method integer date()
 * @method ChatMember oldChatMember()
 * @method ChatMember newChatMember()
 * @method ChatInviteLink inviteLink()
 * 
 * @method static setChat(Chat $chat)
 * @method static setFrom(User $from)
 * @method static setDate(integer $date)
 * @method static setOldChatMember(ChatMember $oldChatMember)
 * @method static setNewChatMember(ChatMember $newChatMember)
 * @method static setInviteLink(ChatInviteLink $inviteLink)
 * 
 * @see https://core.telegram.org/bots/api#chatmemberupdated
 */
class ChatMemberUpdated extends baseType
{
    protected array $fields = [
        'chat'            => Chat::class,
        'from'            => User::class,
        'date'            => 'integer',
        'old_chat_member' => ChatMember::class,
        'new_chat_member' => ChatMember::class,
        'invite_link'     => ChatInviteLink::class,
    ];
}
