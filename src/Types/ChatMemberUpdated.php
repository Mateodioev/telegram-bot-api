<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents changes in the status of a chat member.
 *
 * @property Chat $chat Chat the user belongs to
 * @property User $from Performer of the action, which resulted in the change
 * @property int $date Date the change was done in Unix time
 * @property ChatMember $old_chat_member Previous information about the chat member
 * @property ChatMember $new_chat_member New information about the chat member
 * @property ChatInviteLink|null $invite_link Optional. Chat invite link, which was used by the user to join the chat; for joining by invite link events only.
 * @property bool|null $via_chat_folder_invite_link Optional. True, if the user joined the chat via a chat folder invite link
 *
 * @method Chat chat()
 * @method User from()
 * @method int date()
 * @method ChatMember oldChatMember()
 * @method ChatMember newChatMember()
 * @method ChatInviteLink|null inviteLink()
 * @method bool|null viaChatFolderInviteLink()
 *
 * @method static setChat(Chat $chat)
 * @method static setFrom(User $from)
 * @method static setDate(int $date)
 * @method static setOldChatMember(ChatMember $oldChatMember)
 * @method static setNewChatMember(ChatMember $newChatMember)
 * @method static setInviteLink(ChatInviteLink|null $inviteLink)
 * @method static setViaChatFolderInviteLink(bool|null $viaChatFolderInviteLink)
 *
 * @see https://core.telegram.org/bots/api#chatmemberupdated
 */
class ChatMemberUpdated extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'chat'                        => FieldType::single(Chat::class),
            'from'                        => FieldType::single(User::class),
            'date'                        => FieldType::single('integer'),
            'old_chat_member'             => FieldType::single(ChatMember::class),
            'new_chat_member'             => FieldType::single(ChatMember::class),
            'invite_link'                 => FieldType::optional(ChatInviteLink::class),
            'via_chat_folder_invite_link' => FieldType::optional('boolean'),
        ];
    }
}
