<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Describes actions that a non-administrator user is allowed to take in a chat.
 *
 * @see https://core.telegram.org/bots/api#chatpermissions
 */
class ChatPermissions extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'can_send_messages'         => FieldType::optional('boolean'),
            'can_send_audios'           => FieldType::optional('boolean'),
            'can_send_documents'        => FieldType::optional('boolean'),
            'can_send_photos'           => FieldType::optional('boolean'),
            'can_send_videos'           => FieldType::optional('boolean'),
            'can_send_video_notes'      => FieldType::optional('boolean'),
            'can_send_voice_notes'      => FieldType::optional('boolean'),
            'can_send_polls'            => FieldType::optional('boolean'),
            'can_send_other_messages'   => FieldType::optional('boolean'),
            'can_add_web_page_previews' => FieldType::optional('boolean'),
            'can_change_info'           => FieldType::optional('boolean'),
            'can_invite_users'          => FieldType::optional('boolean'),
            'can_pin_messages'          => FieldType::optional('boolean'),
            'can_manage_topics'         => FieldType::optional('boolean'),
        ];
    }
}
