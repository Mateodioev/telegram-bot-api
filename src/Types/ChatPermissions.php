<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Describes actions that a non-administrator user is allowed to take in a chat.
 *
 * @property bool|null $can_send_messages Optional. True, if the user is allowed to send text messages, contacts, giveaways, giveaway winners, invoices, locations and venues
 * @property bool|null $can_send_audios Optional. True, if the user is allowed to send audios
 * @property bool|null $can_send_documents Optional. True, if the user is allowed to send documents
 * @property bool|null $can_send_photos Optional. True, if the user is allowed to send photos
 * @property bool|null $can_send_videos Optional. True, if the user is allowed to send videos
 * @property bool|null $can_send_video_notes Optional. True, if the user is allowed to send video notes
 * @property bool|null $can_send_voice_notes Optional. True, if the user is allowed to send voice notes
 * @property bool|null $can_send_polls Optional. True, if the user is allowed to send polls
 * @property bool|null $can_send_other_messages Optional. True, if the user is allowed to send animations, games, stickers and use inline bots
 * @property bool|null $can_add_web_page_previews Optional. True, if the user is allowed to add web page previews to their messages
 * @property bool|null $can_change_info Optional. True, if the user is allowed to change the chat title, photo and other settings. Ignored in public supergroups
 * @property bool|null $can_invite_users Optional. True, if the user is allowed to invite new users to the chat
 * @property bool|null $can_pin_messages Optional. True, if the user is allowed to pin messages. Ignored in public supergroups
 * @property bool|null $can_manage_topics Optional. True, if the user is allowed to create forum topics. If omitted defaults to the value of can_pin_messages
 *
 * @method bool|null canSendMessages()
 * @method bool|null canSendAudios()
 * @method bool|null canSendDocuments()
 * @method bool|null canSendPhotos()
 * @method bool|null canSendVideos()
 * @method bool|null canSendVideoNotes()
 * @method bool|null canSendVoiceNotes()
 * @method bool|null canSendPolls()
 * @method bool|null canSendOtherMessages()
 * @method bool|null canAddWebPagePreviews()
 * @method bool|null canChangeInfo()
 * @method bool|null canInviteUsers()
 * @method bool|null canPinMessages()
 * @method bool|null canManageTopics()
 *
 * @method static setCanSendMessages(bool|null $canSendMessages)
 * @method static setCanSendAudios(bool|null $canSendAudios)
 * @method static setCanSendDocuments(bool|null $canSendDocuments)
 * @method static setCanSendPhotos(bool|null $canSendPhotos)
 * @method static setCanSendVideos(bool|null $canSendVideos)
 * @method static setCanSendVideoNotes(bool|null $canSendVideoNotes)
 * @method static setCanSendVoiceNotes(bool|null $canSendVoiceNotes)
 * @method static setCanSendPolls(bool|null $canSendPolls)
 * @method static setCanSendOtherMessages(bool|null $canSendOtherMessages)
 * @method static setCanAddWebPagePreviews(bool|null $canAddWebPagePreviews)
 * @method static setCanChangeInfo(bool|null $canChangeInfo)
 * @method static setCanInviteUsers(bool|null $canInviteUsers)
 * @method static setCanPinMessages(bool|null $canPinMessages)
 * @method static setCanManageTopics(bool|null $canManageTopics)
 *
 * @see https://core.telegram.org/bots/api#chatpermissions
 */
class ChatPermissions extends abstractType
{
    public function __construct(
        ?bool $can_send_messages = null,
        ?bool $can_send_audios = null,
        ?bool $can_send_documents = null,
        ?bool $can_send_photos = null,
        ?bool $can_send_videos = null,
        ?bool $can_send_video_notes = null,
        ?bool $can_send_voice_notes = null,
        ?bool $can_send_polls = null,
        ?bool $can_send_other_messages = null,
        ?bool $can_add_web_page_previews = null,
        ?bool $can_change_info = null,
        ?bool $can_invite_users = null,
        ?bool $can_pin_messages = null,
        ?bool $can_manage_topics = null,
    ) {
        parent::__construct([
            'can_send_messages'         => $can_send_messages,
            'can_send_audios'           => $can_send_audios,
            'can_send_documents'        => $can_send_documents,
            'can_send_photos'           => $can_send_photos,
            'can_send_videos'           => $can_send_videos,
            'can_send_video_notes'      => $can_send_video_notes,
            'can_send_voice_notes'      => $can_send_voice_notes,
            'can_send_polls'            => $can_send_polls,
            'can_send_other_messages'   => $can_send_other_messages,
            'can_add_web_page_previews' => $can_add_web_page_previews,
            'can_change_info'           => $can_change_info,
            'can_invite_users'          => $can_invite_users,
            'can_pin_messages'          => $can_pin_messages,
            'can_manage_topics'         => $can_manage_topics,
        ]);
    }

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
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
