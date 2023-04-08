<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * Represents an invite link for a chat.
 * 
 * @property string  $invite_link                The invite link. If the link was created by another chat administrator, then the second part of the link will be replaced with “…”.
 * @property User    $creator                    Creator of the link
 * @property boolean $create_join_request        True, if users joining the chat via the link need to be approved by chat administrators
 * @property boolean $is_primary                 True, if the link is primary
 * @property boolean $is_revoked                 True, if the link is revoked
 * @property string  $name                       Optional. Invite link name
 * @property integer $expire_date                Optional. Point in time (Unix timestamp) when the link will expire or has been expired
 * @property integer $member_limit               Optional. The maximum number of users that can be members of the chat simultaneously after joining the chat via this invite link; 1-99999
 * @property integer $pending_join_request_count Optional. Number of pending join requests created using this link
 * 
 * @method string   inviteLink()
 * @method User     creator()
 * @method boolean  createJoinRequest()
 * @method boolean  isPrimary()
 * @method boolean  isRevoked()
 * @method ?string  name()
 * @method ?integer expireDate()
 * @method ?integer memberLimit()
 * @method ?integer pendingJoinRequestCount()
 * 
 * @method static setinviteLink(string $inviteLink)
 * @method static setCreator(User $creator)
 * @method static setCreateJoinRequest(boolean $createJoinRequest)
 * @method static setIsPrimary(boolean $isPrimary)
 * @method static setIsRevoked(boolean $isRevoked)
 * @method static setName(string $name)
 * @method static setExpireDate(integer $expireDate)
 * @method static setMemberLimit(integer $memberLimit)
 * @method static setPendingJoinRequestCount(integer $pendingJoinRequestCount)
 * 
 * @see https://core.telegram.org/bots/api#chatinvitelink
 */
class ChatInviteLink extends baseType
{
    protected array $fields = [
        'invite_link'                => 'string',
        'creator'                    => User::class,
        'create_join_request'        => 'boolean',
        'is_primary'                 => 'boolean',
        'is_revoked'                 => 'boolean',
        'name'                       => 'string',
        'expire_date'                => 'integer',
        'member_limit'               => 'integer',
        'pending_join_request_count' => 'integer',
    ];
}
