<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Represents a chat member that is under certain restrictions in the chat. Supergroups only.
 *
 * @see https://core.telegram.org/bots/api#chatmemberrestricted
 */
class ChatMemberRestricted extends ChatMember
{
    protected function boot(): void
    {
        $this->fields = [
            'status'                    => FieldType::single('string'),
            'user'                      => FieldType::single(User::class),
            'is_member'                 => FieldType::single('boolean'),
            'can_send_messages'         => FieldType::single('boolean'),
            'can_send_audios'           => FieldType::single('boolean'),
            'can_send_documents'        => FieldType::single('boolean'),
            'can_send_photos'           => FieldType::single('boolean'),
            'can_send_videos'           => FieldType::single('boolean'),
            'can_send_video_notes'      => FieldType::single('boolean'),
            'can_send_voice_notes'      => FieldType::single('boolean'),
            'can_send_polls'            => FieldType::single('boolean'),
            'can_send_other_messages'   => FieldType::single('boolean'),
            'can_add_web_page_previews' => FieldType::single('boolean'),
            'can_change_info'           => FieldType::single('boolean'),
            'can_invite_users'          => FieldType::single('boolean'),
            'can_pin_messages'          => FieldType::single('boolean'),
            'can_manage_topics'         => FieldType::single('boolean'),
            'until_date'                => FieldType::single('integer'),
        ];
    }
}
