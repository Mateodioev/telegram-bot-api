<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * Describes actions that a non-administrator user is allowed to take in a chat.
 * 
 * @property boolean $can_send_messages         Optional. True, if the user is allowed to send text messages, contacts, invoices, locations and venues
 * @property boolean $can_send_audios           Optional. True, if the user is allowed to send audios
 * @property boolean $can_send_documents        Optional. True, if the user is allowed to send documents
 * @property boolean $can_send_photos           Optional. True, if the user is allowed to send photos
 * @property boolean $can_send_videos           Optional. True, if the user is allowed to send videos
 * @property boolean $can_send_video_notes      Optional. True, if the user is allowed to send video notes
 * @property boolean $can_send_voice_notes      Optional. True, if the user is allowed to send voice notes
 * @property boolean $can_send_polls            Optional. True, if the user is allowed to send polls
 * @property boolean $can_send_other_messages   Optional. True, if the user is allowed to send animations, games, stickers and use inline bots
 * @property boolean $can_add_web_page_previews Optional. True, if the user is allowed to add web page previews to their messages
 * @property boolean $can_change_info           Optional. True, if the user is allowed to change the chat title, photo and other settings. Ignored in public supergroups
 * @property boolean $canInviteUsers            Optional. True, if the user is allowed to invite new users to the chat $can_invite_users Optional. True, if the user is allowed to invite new users to the chat
 * @property boolean $can_pin_messages          Optional. True, if the user is allowed to pin messages. Ignored in public supergroups
 * @property boolean $can_manage_topics         Optional. True, if the user is allowed to create forum topics. If omitted defaults to the value of can_pin_messages
 * 
 * @method ?boolean canSendMessages()
 * @method ?boolean canSendAudios()
 * @method ?boolean canSendDocuments()
 * @method ?boolean canSendPhotos()
 * @method ?boolean canSendVideos()
 * @method ?boolean canSendVideoNotes()
 * @method ?boolean canSendVoiceNotes()
 * @method ?boolean canSendPolls()
 * @method ?boolean canSendOtherMessages()
 * @method ?boolean canAddWebPagePreviews()
 * @method ?boolean canChangeInfo()
 * @method ?boolean canInviteUsers()
 * @method ?boolean canPinMessages()
 * @method ?boolean canManageTopics()
 * 
 * @method static setCanSendMessages(boolean $canSendMessages)
 * @method static setCanSendAudios(boolean $canSendAudios)
 * @method static setCanSendDocuments(boolean $canSendDocuments)
 * @method static setCanSendPhotos(boolean $canSendPhotos)
 * @method static setCanSendVideos(boolean $canSendVideos)
 * @method static setCanSendVideoNotes(boolean $canSendVideoNotes)
 * @method static setCanSendVoiceNotes(boolean $canSendVoiceNotes)
 * @method static setCanSendPolls(boolean $canSendPolls)
 * @method static setCanSendOtherMessages(boolean $canSendOtherMessages)
 * @method static setCanAddWebPagePreviews(boolean $canAddWebPagePreviews)
 * @method static setCanChangeInfo(boolean $canChangeInfo)
 * @method static setCanInviteUsers(boolean chat $canInviteUsers)
 * @method static setCanPinMessages(boolean $canPinMessages)
 * @method static setCanManageTopics(boolean $canManageTopics)
 * 
 * @see https://core.telegram.org/bots/api#chatpermissions
 */
class ChatPermissions extends baseType
{
    protected array $fields = [
        'can_send_messages'         => 'boolean',
        'can_send_audios'           => 'boolean',
        'can_send_documents'        => 'boolean',
        'can_send_photos'           => 'boolean',
        'can_send_videos'           => 'boolean',
        'can_send_video_notes'      => 'boolean',
        'can_send_voice_notes'      => 'boolean',
        'can_send_polls'            => 'boolean',
        'can_send_other_messages'   => 'boolean',
        'can_add_web_page_previews' => 'boolean',
        'can_change_info'           => 'boolean',
        'can_invite_users'          => 'boolean',
        'can_pin_messages'          => 'boolean',
        'can_manage_topics'         => 'boolean',
    ];
}
