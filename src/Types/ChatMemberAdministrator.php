<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Represents a chat member that has some additional privileges.
 *
 * @see https://core.telegram.org/bots/api#chatmemberadministrator
 */
class ChatMemberAdministrator extends ChatMember
{
    protected function boot(): void
    {
        $this->fields = [
            'status'                 => FieldType::single('string'),
            'user'                   => FieldType::single(User::class),
            'can_be_edited'          => FieldType::single('boolean'),
            'is_anonymous'           => FieldType::single('boolean'),
            'can_manage_chat'        => FieldType::single('boolean'),
            'can_delete_messages'    => FieldType::single('boolean'),
            'can_manage_video_chats' => FieldType::single('boolean'),
            'can_restrict_members'   => FieldType::single('boolean'),
            'can_promote_members'    => FieldType::single('boolean'),
            'can_change_info'        => FieldType::single('boolean'),
            'can_invite_users'       => FieldType::single('boolean'),
            'can_post_messages'      => FieldType::optional('boolean'),
            'can_edit_messages'      => FieldType::optional('boolean'),
            'can_pin_messages'       => FieldType::optional('boolean'),
            'can_manage_topics'      => FieldType::optional('boolean'),
            'custom_title'           => FieldType::optional('string'),
        ];
    }
}
