<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents a chat.
 *
 * @see https://core.telegram.org/bots/api#chat
 */
class Chat extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'id'                                      => FieldType::single('integer'),
            'type'                                    => FieldType::single('string'),
            'title'                                   => FieldType::optional('string'),
            'username'                                => FieldType::optional('string'),
            'first_name'                              => FieldType::optional('string'),
            'last_name'                               => FieldType::optional('string'),
            'is_forum'                                => FieldType::optional('boolean'),
            'photo'                                   => FieldType::optional(ChatPhoto::class),
            'active_usernames'                        => new FieldType('string', allowArrays: true, allowNull: true, subTypes: []),
            'emoji_status_custom_emoji_id'            => FieldType::optional('string'),
            'emoji_status_expiration_date'            => FieldType::optional('integer'),
            'bio'                                     => FieldType::optional('string'),
            'has_private_forwards'                    => FieldType::optional('boolean'),
            'has_restricted_voice_and_video_messages' => FieldType::optional('boolean'),
            'join_to_send_messages'                   => FieldType::optional('boolean'),
            'join_by_request'                         => FieldType::optional('boolean'),
            'description'                             => FieldType::optional('string'),
            'invite_link'                             => FieldType::optional('string'),
            'pinned_message'                          => FieldType::optional(Message::class),
            'permissions'                             => FieldType::optional(ChatPermissions::class),
            'slow_mode_delay'                         => FieldType::optional('integer'),
            'message_auto_delete_time'                => FieldType::optional('integer'),
            'has_aggressive_anti_spam_enabled'        => FieldType::optional('boolean'),
            'has_hidden_members'                      => FieldType::optional('boolean'),
            'has_protected_content'                   => FieldType::optional('boolean'),
            'sticker_set_name'                        => FieldType::optional('string'),
            'can_set_sticker_set'                     => FieldType::optional('boolean'),
            'linked_chat_id'                          => FieldType::optional('integer'),
            'location'                                => FieldType::optional(ChatLocation::class),
        ];
    }
}
