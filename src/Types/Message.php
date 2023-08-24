<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents a message.
 *
 * @see https://core.telegram.org/bots/api#message
 */
class Message extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'message_id'                        => FieldType::single('integer'),
            'message_thread_id'                 => FieldType::optional('integer'),
            'from'                              => FieldType::optional(User::class),
            'sender_chat'                       => FieldType::optional(Chat::class),
            'date'                              => FieldType::single('integer'),
            'chat'                              => FieldType::single(Chat::class),
            'forward_from'                      => FieldType::optional(User::class),
            'forward_from_chat'                 => FieldType::optional(Chat::class),
            'forward_from_message_id'           => FieldType::optional('integer'),
            'forward_signature'                 => FieldType::optional('string'),
            'forward_sender_name'               => FieldType::optional('string'),
            'forward_date'                      => FieldType::optional('integer'),
            'is_topic_message'                  => FieldType::optional('boolean'),
            'is_automatic_forward'              => FieldType::optional('boolean'),
            'reply_to_message'                  => FieldType::optional(Message::class),
            'via_bot'                           => FieldType::optional(User::class),
            'edit_date'                         => FieldType::optional('integer'),
            'has_protected_content'             => FieldType::optional('boolean'),
            'media_group_id'                    => FieldType::optional('string'),
            'author_signature'                  => FieldType::optional('string'),
            'text'                              => FieldType::optional('string'),
            'entities'                          => new FieldType(MessageEntity::class, allowArrays: true, allowNull: true, subTypes: []),
            'animation'                         => FieldType::optional(Animation::class),
            'audio'                             => FieldType::optional(Audio::class),
            'document'                          => FieldType::optional(Document::class),
            'photo'                             => new FieldType(PhotoSize::class, allowArrays: true, allowNull: true, subTypes: []),
            'sticker'                           => FieldType::optional(Sticker::class),
            'story'                             => FieldType::optional(Story::class),
            'video'                             => FieldType::optional(Video::class),
            'video_note'                        => FieldType::optional(VideoNote::class),
            'voice'                             => FieldType::optional(Voice::class),
            'caption'                           => FieldType::optional('string'),
            'caption_entities'                  => new FieldType(MessageEntity::class, allowArrays: true, allowNull: true, subTypes: []),
            'has_media_spoiler'                 => FieldType::optional('boolean'),
            'contact'                           => FieldType::optional(Contact::class),
            'dice'                              => FieldType::optional(Dice::class),
            'game'                              => FieldType::optional(Game::class),
            'poll'                              => FieldType::optional(Poll::class),
            'venue'                             => FieldType::optional(Venue::class),
            'location'                          => FieldType::optional(Location::class),
            'new_chat_members'                  => new FieldType(User::class, allowArrays: true, allowNull: true, subTypes: []),
            'left_chat_member'                  => FieldType::optional(User::class),
            'new_chat_title'                    => FieldType::optional('string'),
            'new_chat_photo'                    => new FieldType(PhotoSize::class, allowArrays: true, allowNull: true, subTypes: []),
            'delete_chat_photo'                 => FieldType::optional('boolean'),
            'group_chat_created'                => FieldType::optional('boolean'),
            'supergroup_chat_created'           => FieldType::optional('boolean'),
            'channel_chat_created'              => FieldType::optional('boolean'),
            'message_auto_delete_timer_changed' => FieldType::optional(MessageAutoDeleteTimerChanged::class),
            'migrate_to_chat_id'                => FieldType::optional('integer'),
            'migrate_from_chat_id'              => FieldType::optional('integer'),
            'pinned_message'                    => FieldType::optional(Message::class),
            'invoice'                           => FieldType::optional(Invoice::class),
            'successful_payment'                => FieldType::optional(SuccessfulPayment::class),
            'user_shared'                       => FieldType::optional(UserShared::class),
            'chat_shared'                       => FieldType::optional(ChatShared::class),
            'connected_website'                 => FieldType::optional('string'),
            'write_access_allowed'              => FieldType::optional(WriteAccessAllowed::class),
            'passport_data'                     => FieldType::optional(PassportData::class),
            'proximity_alert_triggered'         => FieldType::optional(ProximityAlertTriggered::class),
            'forum_topic_created'               => FieldType::optional(ForumTopicCreated::class),
            'forum_topic_edited'                => FieldType::optional(ForumTopicEdited::class),
            'forum_topic_closed'                => FieldType::optional(ForumTopicClosed::class),
            'forum_topic_reopened'              => FieldType::optional(ForumTopicReopened::class),
            'general_forum_topic_hidden'        => FieldType::optional(GeneralForumTopicHidden::class),
            'general_forum_topic_unhidden'      => FieldType::optional(GeneralForumTopicUnhidden::class),
            'video_chat_scheduled'              => FieldType::optional(VideoChatScheduled::class),
            'video_chat_started'                => FieldType::optional(VideoChatStarted::class),
            'video_chat_ended'                  => FieldType::optional(VideoChatEnded::class),
            'video_chat_participants_invited'   => FieldType::optional(VideoChatParticipantsInvited::class),
            'web_app_data'                      => FieldType::optional(WebAppData::class),
            'reply_markup'                      => FieldType::optional(InlineKeyboardMarkup::class),
        ];
    }
}
