<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Represents the rights of an administrator in a chat.
 *
 * @see https://core.telegram.org/bots/api#chatadministratorrights
 */
class ChatAdministratorRights extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
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
        ];
    }
}
