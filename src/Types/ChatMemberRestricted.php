<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Represents a chat member that is under certain restrictions in the chat. Supergroups only.
 *
 * @property string $status The member's status in the chat, always "restricted"
 * @property User $user Information about the user
 * @property bool $is_member True, if the user is a member of the chat at the moment of the request
 * @property bool $can_send_messages True, if the user is allowed to send text messages, contacts, giveaways, giveaway winners, invoices, locations and venues
 * @property bool $can_send_audios True, if the user is allowed to send audios
 * @property bool $can_send_documents True, if the user is allowed to send documents
 * @property bool $can_send_photos True, if the user is allowed to send photos
 * @property bool $can_send_videos True, if the user is allowed to send videos
 * @property bool $can_send_video_notes True, if the user is allowed to send video notes
 * @property bool $can_send_voice_notes True, if the user is allowed to send voice notes
 * @property bool $can_send_polls True, if the user is allowed to send polls
 * @property bool $can_send_other_messages True, if the user is allowed to send animations, games, stickers and use inline bots
 * @property bool $can_add_web_page_previews True, if the user is allowed to add web page previews to their messages
 * @property bool $can_change_info True, if the user is allowed to change the chat title, photo and other settings
 * @property bool $can_invite_users True, if the user is allowed to invite new users to the chat
 * @property bool $can_pin_messages True, if the user is allowed to pin messages
 * @property bool $can_manage_topics True, if the user is allowed to create forum topics
 * @property int $until_date Date when restrictions will be lifted for this user; Unix time. If 0, then the user is restricted forever
 *
 * @method string status()
 * @method User user()
 * @method bool isMember()
 * @method bool canSendMessages()
 * @method bool canSendAudios()
 * @method bool canSendDocuments()
 * @method bool canSendPhotos()
 * @method bool canSendVideos()
 * @method bool canSendVideoNotes()
 * @method bool canSendVoiceNotes()
 * @method bool canSendPolls()
 * @method bool canSendOtherMessages()
 * @method bool canAddWebPagePreviews()
 * @method bool canChangeInfo()
 * @method bool canInviteUsers()
 * @method bool canPinMessages()
 * @method bool canManageTopics()
 * @method int untilDate()
 *
 * @method static setStatus(string $status)
 * @method static setUser(User $user)
 * @method static setIsMember(bool $isMember)
 * @method static setCanSendMessages(bool $canSendMessages)
 * @method static setCanSendAudios(bool $canSendAudios)
 * @method static setCanSendDocuments(bool $canSendDocuments)
 * @method static setCanSendPhotos(bool $canSendPhotos)
 * @method static setCanSendVideos(bool $canSendVideos)
 * @method static setCanSendVideoNotes(bool $canSendVideoNotes)
 * @method static setCanSendVoiceNotes(bool $canSendVoiceNotes)
 * @method static setCanSendPolls(bool $canSendPolls)
 * @method static setCanSendOtherMessages(bool $canSendOtherMessages)
 * @method static setCanAddWebPagePreviews(bool $canAddWebPagePreviews)
 * @method static setCanChangeInfo(bool $canChangeInfo)
 * @method static setCanInviteUsers(bool $canInviteUsers)
 * @method static setCanPinMessages(bool $canPinMessages)
 * @method static setCanManageTopics(bool $canManageTopics)
 * @method static setUntilDate(int $untilDate)
 *
 * @see https://core.telegram.org/bots/api#chatmemberrestricted
 */
class ChatMemberRestricted extends ChatMember
{
    public const STATUS = 'restricted';

    public function __construct(
        User $user,
        bool $is_member,
        bool $can_send_messages,
        bool $can_send_audios,
        bool $can_send_documents,
        bool $can_send_photos,
        bool $can_send_videos,
        bool $can_send_video_notes,
        bool $can_send_voice_notes,
        bool $can_send_polls,
        bool $can_send_other_messages,
        bool $can_add_web_page_previews,
        bool $can_change_info,
        bool $can_invite_users,
        bool $can_pin_messages,
        bool $can_manage_topics,
        int $until_date,
    ) {
        parent::__construct([
            'status'                    => self::STATUS,
            'user'                      => $user,
            'is_member'                 => $is_member,
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
            'until_date'                => $until_date,
        ]);
    }

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
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
