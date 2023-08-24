<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents changes in the status of a chat member.
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
