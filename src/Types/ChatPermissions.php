<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Describes actions that a non-administrator user is allowed to take in a chat.
 *
 * @property ?bool $can_send_messages Optional. True, if the user is allowed to send text messages, contacts, invoices, locations and venues
 * @property ?bool $can_send_audios Optional. True, if the user is allowed to send audios
 * @property ?bool $can_send_documents Optional. True, if the user is allowed to send documents
 * @property ?bool $can_send_photos Optional. True, if the user is allowed to send photos
 * @property ?bool $can_send_videos Optional. True, if the user is allowed to send videos
 * @property ?bool $can_send_video_notes Optional. True, if the user is allowed to send video notes
 * @property ?bool $can_send_voice_notes Optional. True, if the user is allowed to send voice notes
 * @property ?bool $can_send_polls Optional. True, if the user is allowed to send polls
 * @property ?bool $can_send_other_messages Optional. True, if the user is allowed to send animations, games, stickers and use inline bots
 * @property ?bool $can_add_web_page_previews Optional. True, if the user is allowed to add web page previews to their messages
 * @property ?bool $can_change_info Optional. True, if the user is allowed to change the chat title, photo and other settings. Ignored in public supergroups
 * @property ?bool $can_invite_users Optional. True, if the user is allowed to invite new users to the chat
 * @property ?bool $can_pin_messages Optional. True, if the user is allowed to pin messages. Ignored in public supergroups
 * @property ?bool $can_manage_topics Optional. True, if the user is allowed to create forum topics. If omitted defaults to the value of can_pin_messages
 *
 * @method ?bool canSendMessages()
 * @method ?bool canSendAudios()
 * @method ?bool canSendDocuments()
 * @method ?bool canSendPhotos()
 * @method ?bool canSendVideos()
 * @method ?bool canSendVideoNotes()
 * @method ?bool canSendVoiceNotes()
 * @method ?bool canSendPolls()
 * @method ?bool canSendOtherMessages()
 * @method ?bool canAddWebPagePreviews()
 * @method ?bool canChangeInfo()
 * @method ?bool canInviteUsers()
 * @method ?bool canPinMessages()
 * @method ?bool canManageTopics()
 *
 * @method static setCanSendMessages(?bool $canSendMessages)
 * @method static setCanSendAudios(?bool $canSendAudios)
 * @method static setCanSendDocuments(?bool $canSendDocuments)
 * @method static setCanSendPhotos(?bool $canSendPhotos)
 * @method static setCanSendVideos(?bool $canSendVideos)
 * @method static setCanSendVideoNotes(?bool $canSendVideoNotes)
 * @method static setCanSendVoiceNotes(?bool $canSendVoiceNotes)
 * @method static setCanSendPolls(?bool $canSendPolls)
 * @method static setCanSendOtherMessages(?bool $canSendOtherMessages)
 * @method static setCanAddWebPagePreviews(?bool $canAddWebPagePreviews)
 * @method static setCanChangeInfo(?bool $canChangeInfo)
 * @method static setCanInviteUsers(?bool $canInviteUsers)
 * @method static setCanPinMessages(?bool $canPinMessages)
 * @method static setCanManageTopics(?bool $canManageTopics)
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
