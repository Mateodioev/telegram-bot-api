<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Represents a chat member that has some additional privileges.
 *
 * @property string $status The member's status in the chat, always "administrator"
 * @property User $user Information about the user
 * @property bool $can_be_edited True, if the bot is allowed to edit administrator privileges of that user
 * @property bool $is_anonymous True, if the user's presence in the chat is hidden
 * @property bool $can_manage_chat True, if the administrator can access the chat event log, chat statistics, message statistics in channels, see channel members, see anonymous administrators in supergroups and ignore slow mode. Implied by any other administrator privilege
 * @property bool $can_delete_messages True, if the administrator can delete messages of other users
 * @property bool $can_manage_video_chats True, if the administrator can manage video chats
 * @property bool $can_restrict_members True, if the administrator can restrict, ban or unban chat members
 * @property bool $can_promote_members True, if the administrator can add new administrators with a subset of their own privileges or demote administrators that they have promoted, directly or indirectly (promoted by administrators that were appointed by the user)
 * @property bool $can_change_info True, if the user is allowed to change the chat title, photo and other settings
 * @property bool $can_invite_users True, if the user is allowed to invite new users to the chat
 * @property ?bool $can_post_messages Optional. True, if the administrator can post in the channel; channels only
 * @property ?bool $can_edit_messages Optional. True, if the administrator can edit messages of other users and can pin messages; channels only
 * @property ?bool $can_pin_messages Optional. True, if the user is allowed to pin messages; groups and supergroups only
 * @property ?bool $can_manage_topics Optional. True, if the user is allowed to create, rename, close, and reopen forum topics; supergroups only
 * @property ?string $custom_title Optional. Custom title for this user
 *
 * @method string status()
 * @method User user()
 * @method bool canBeEdited()
 * @method bool isAnonymous()
 * @method bool canManageChat()
 * @method bool canDeleteMessages()
 * @method bool canManageVideoChats()
 * @method bool canRestrictMembers()
 * @method bool canPromoteMembers()
 * @method bool canChangeInfo()
 * @method bool canInviteUsers()
 * @method ?bool canPostMessages()
 * @method ?bool canEditMessages()
 * @method ?bool canPinMessages()
 * @method ?bool canManageTopics()
 * @method ?string customTitle()
 *
 * @method static setStatus(string $status)
 * @method static setUser(User $user)
 * @method static setCanBeEdited(bool $canBeEdited)
 * @method static setIsAnonymous(bool $isAnonymous)
 * @method static setCanManageChat(bool $canManageChat)
 * @method static setCanDeleteMessages(bool $canDeleteMessages)
 * @method static setCanManageVideoChats(bool $canManageVideoChats)
 * @method static setCanRestrictMembers(bool $canRestrictMembers)
 * @method static setCanPromoteMembers(bool $canPromoteMembers)
 * @method static setCanChangeInfo(bool $canChangeInfo)
 * @method static setCanInviteUsers(bool $canInviteUsers)
 * @method static setCanPostMessages(?bool $canPostMessages)
 * @method static setCanEditMessages(?bool $canEditMessages)
 * @method static setCanPinMessages(?bool $canPinMessages)
 * @method static setCanManageTopics(?bool $canManageTopics)
 * @method static setCustomTitle(?string $customTitle)
 *
 * @see https://core.telegram.org/bots/api#chatmemberadministrator
 */
class ChatMemberAdministrator extends ChatMember
{
    protected function boot(): void
    {
        $this->fields = [
            'status'                 => FieldType::single('string'),
            'user'                   => FieldType::single(User::class),
            'can_be_edited'          => FieldType::single('boolean'),
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
            'custom_title'           => FieldType::optional('string'),
        ];
    }
}
