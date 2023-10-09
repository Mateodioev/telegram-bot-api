<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Represents the rights of an administrator in a chat.
 *
 * @property bool $is_anonymous True, if the user's presence in the chat is hidden
 * @property bool $can_manage_chat True, if the administrator can access the chat event log, chat statistics, boost list in channels, message statistics in channels, see channel members, see anonymous administrators in supergroups and ignore slow mode. Implied by any other administrator privilege
 * @property bool $can_delete_messages True, if the administrator can delete messages of other users
 * @property bool $can_manage_video_chats True, if the administrator can manage video chats
 * @property bool $can_restrict_members True, if the administrator can restrict, ban or unban chat members
 * @property bool $can_promote_members True, if the administrator can add new administrators with a subset of their own privileges or demote administrators that they have promoted, directly or indirectly (promoted by administrators that were appointed by the user)
 * @property bool $can_change_info True, if the user is allowed to change the chat title, photo and other settings
 * @property bool $can_invite_users True, if the user is allowed to invite new users to the chat
 * @property bool|null $can_post_messages Optional. True, if the administrator can post messages in the channel; channels only
 * @property bool|null $can_edit_messages Optional. True, if the administrator can edit messages of other users and can pin messages; channels only
 * @property bool|null $can_pin_messages Optional. True, if the user is allowed to pin messages; groups and supergroups only
 * @property bool|null $can_post_stories Optional. True, if the administrator can post stories in the channel; channels only
 * @property bool|null $can_edit_stories Optional. True, if the administrator can edit stories posted by other users; channels only
 * @property bool|null $can_delete_stories Optional. True, if the administrator can delete stories posted by other users; channels only
 * @property bool|null $can_manage_topics Optional. True, if the user is allowed to create, rename, close, and reopen forum topics; supergroups only
 *
 * @method bool isAnonymous()
 * @method bool canManageChat()
 * @method bool canDeleteMessages()
 * @method bool canManageVideoChats()
 * @method bool canRestrictMembers()
 * @method bool canPromoteMembers()
 * @method bool canChangeInfo()
 * @method bool canInviteUsers()
 * @method bool|null canPostMessages()
 * @method bool|null canEditMessages()
 * @method bool|null canPinMessages()
 * @method bool|null canPostStories()
 * @method bool|null canEditStories()
 * @method bool|null canDeleteStories()
 * @method bool|null canManageTopics()
 *
 * @method static setIsAnonymous(bool $isAnonymous)
 * @method static setCanManageChat(bool $canManageChat)
 * @method static setCanDeleteMessages(bool $canDeleteMessages)
 * @method static setCanManageVideoChats(bool $canManageVideoChats)
 * @method static setCanRestrictMembers(bool $canRestrictMembers)
 * @method static setCanPromoteMembers(bool $canPromoteMembers)
 * @method static setCanChangeInfo(bool $canChangeInfo)
 * @method static setCanInviteUsers(bool $canInviteUsers)
 * @method static setCanPostMessages(bool|null $canPostMessages)
 * @method static setCanEditMessages(bool|null $canEditMessages)
 * @method static setCanPinMessages(bool|null $canPinMessages)
 * @method static setCanPostStories(bool|null $canPostStories)
 * @method static setCanEditStories(bool|null $canEditStories)
 * @method static setCanDeleteStories(bool|null $canDeleteStories)
 * @method static setCanManageTopics(bool|null $canManageTopics)
 *
 * @see https://core.telegram.org/bots/api#chatadministratorrights
 */
class ChatAdministratorRights extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
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
            'can_post_stories'       => FieldType::optional('boolean'),
            'can_edit_stories'       => FieldType::optional('boolean'),
            'can_delete_stories'     => FieldType::optional('boolean'),
            'can_manage_topics'      => FieldType::optional('boolean'),
        ];
    }
}
