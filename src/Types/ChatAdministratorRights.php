<?php

namespace Mateodioev\Bots\Telegram\Types;

/**
 * Represents the rights of an administrator in a chat.
 * 
 * @property boolean $is_anoymous            True, if the user's presence in the chat is hidden
 * @property boolean $can_manage_chat        True, if the administrator can access the chat event log, chat statistics, message statistics in channels, see channel members, see anonymous administrators in supergroups and ignore slow mode. Implied by any other administrator privilege
 * @property boolean $can_delete_messages    True, if the administrator can delete messages of other users
 * @property boolean $can_manage_video_chats True, if the administrator can manage video chats
 * @property boolean $can_restrict_members   True, if the administrator can restrict, ban or unban chat members
 * @property boolean $can_promote_members    True, if the administrator can add new administrators with a subset of their own privileges or demote administrators that they have promoted, directly or indirectly (promoted by administrators that were appointed by the user)
 * @property boolean $can_change_info        True, if the user is allowed to change the chat title, photo and other settings
 * @property boolean $can_invite_users       True, if the user is allowed to invite new users to the chat
 * @property boolean $can_post_messages      Optional. True, if the administrator can post in the channel; channels only
 * @property boolean $can_edit_messages      Optional. True, if the administrator can edit messages of other users and can pin messages; channels only
 * @property boolean $can_pin_messages       Optional. True, if the user is allowed to pin messages; groups and supergroups only
 * @property boolean $can_manage_topics      Optional. True, if the user is allowed to create, rename, close, and reopen forum topics; supergroups only
 * 
 * @method boolean  isAnoymous()
 * @method boolean  canManageChat()
 * @method boolean  canDeleteMessages()
 * @method boolean  canManageVideoChats()
 * @method boolean  canRestrictMembers()
 * @method boolean  canPromoteMembers()
 * @method boolean  canChangeInfo()
 * @method boolean  canInviteUsers()
 * @method ?boolean canPostMessages()
 * @method ?boolean canEditMessages()
 * @method ?boolean canPinMessages()
 * @method ?boolean canManageTopics()
 * 
 * @method static setIsAnoymous(boolean $isAnoymous)
 * @method static setCanManageChat(boolean $canManageChat)
 * @method static setCanDeleteMessages(boolean $canDeleteMessages)
 * @method static setCanManageVideoChats(boolean $canManageVideoChats)
 * @method static setCanRestrictMembers(boolean $canRestrictMembers)
 * @method static setCanPromoteMembers(boolean $canPromoteMembers)
 * @method static setCanChangeInfo(boolean $canChangeInfo)
 * @method static setCanInviteUsers(boolean $canInviteUsers)
 * @method static setCanPostMessages(boolean $canPostMessages)
 * @method static setCanEditMessages(boolean $canEditMessages)
 * @method static setCanPinMessages(boolean $canPinMessages)
 * @method static setCanManageTopics(boolean $canManageTopics)
 * 
 * @see https://core.telegram.org/bots/api#chatadministratorrights
 */
class ChatAdministratorRights extends baseType
{
    protected array $fields = [
        'is_anoymous'            => 'boolean',
        'can_manage_chat'        => 'boolean',
        'can_delete_messages'    => 'boolean',
        'can_manage_video_chats' => 'boolean',
        'can_restrict_members'   => 'boolean',
        'can_promote_members'    => 'boolean',
        'can_change_info'        => 'boolean',
        'can_invite_users'       => 'boolean',
        'can_post_messages'      => 'boolean',
        'can_edit_messages'      => 'boolean',
        'can_pin_messages'       => 'boolean',
        'can_manage_topics'      => 'boolean'
    ];
}
