<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * Represents a [chat member](https://core.telegram.org/bots/api#chatmember) that is under certain restrictions in the chat. Supergroups only.
 * 
 * @property string  $status                    The member's status in the chat, always “restricted”
 * @property User    $user                      Information about the user
 * @property boolean $is_member                 True, if the user is a member of the chat at the moment of the request
 * @property boolean $can_send_messages         True, if the user is allowed to send text messages, contacts, invoices, locations and venues
 * @property boolean $can_send_audios           True, if the user is allowed to send audios
 * @property boolean $can_send_documents        True, if the user is allowed to send documents
 * @property boolean $can_send_photos           True, if the user is allowed to send photos
 * @property boolean $can_send_videos           True, if the user is allowed to send videos
 * @property boolean $can_send_video_notes      True, if the user is allowed to send video notes
 * @property boolean $can_send_voice_notes      True, if the user is allowed to send voice notes
 * @property boolean $can_send_polls            True, if the user is allowed to send polls
 * @property boolean $can_send_other_messages   True, if the user is allowed to send animations, games, stickers and use inline bots
 * @property boolean $can_add_web_page_previews True, if the user is allowed to add web page previews to their messages
 * @property boolean $can_change_info           True, if the user is allowed to change the chat title, photo and other settings
 * @property boolean $can_invite_users          True, if the user is allowed to invite new users to the chat
 * @property boolean $can_pin_messages          True, if the user is allowed to pin messages
 * @property boolean $can_manage_topics         True, if the user is allowed to create forum topics
 * @property integer $until_date                Date when restrictions will be lifted for this user; unix time. If 0, then the user is restricted forever
 * 
 * @method string  status()
 * @method User    user()
 * @method boolean isMember()
 * @method boolean canSendMessages()
 * @method boolean canSendAudios()
 * @method boolean canSendDocuments()
 * @method boolean canSendPhotos()
 * @method boolean canSendVideos()
 * @method boolean canSendVideoNotes()
 * @method boolean canSendVoiceNotes()
 * @method boolean canSendPolls()
 * @method boolean canSendOtherMessages()
 * @method boolean canAddWebPagePreviews()
 * @method boolean canChangeInfo()
 * @method boolean canInviteUsers()
 * @method boolean canPinMessages()
 * @method boolean canManageTopics()
 * @method integer untilDate()
 * 
 * @method static setStatus(string $status)
 * @method static setUser(User $user)
 * @method static setIsMember(boolean $isMember)
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
 * @method static setCanInviteUsers(boolean $canInviteUsers)
 * @method static setCanPinMessages(boolean $canPinMessages)
 * @method static setCanManageTopics(boolean $canManageTopics)
 * @method static setUntilDate(integer $untilDate)
 * 
 * @see https://core.telegram.org/bots/api#chatmemberrestricted
 */
class ChatMemberRestricted extends ChatMember
{
    protected array $fields = [
        'status'                    => 'string',
        'user'                      => User::class,
        'is_member'                 => 'boolean',
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
        'until_date'                => 'integer',
    ];
}
