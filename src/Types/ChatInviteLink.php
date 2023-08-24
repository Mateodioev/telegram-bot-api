<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Represents an invite link for a chat.
 *
 * @property string $invite_link The invite link. If the link was created by another chat administrator, then the second part of the link will be replaced with "...".
 * @property User $creator Creator of the link
 * @property bool $creates_join_request True, if users joining the chat via the link need to be approved by chat administrators
 * @property bool $is_primary True, if the link is primary
 * @property bool $is_revoked True, if the link is revoked
 * @property ?string $name Optional. Invite link name
 * @property ?int $expire_date Optional. Point in time (Unix timestamp) when the link will expire or has been expired
 * @property ?int $member_limit Optional. The maximum number of users that can be members of the chat simultaneously after joining the chat via this invite link; 1-99999
 * @property ?int $pending_join_request_count Optional. Number of pending join requests created using this link
 *
 * @method string inviteLink()
 * @method User creator()
 * @method bool createsJoinRequest()
 * @method bool isPrimary()
 * @method bool isRevoked()
 * @method ?string name()
 * @method ?int expireDate()
 * @method ?int memberLimit()
 * @method ?int pendingJoinRequestCount()
 *
 * @method static setInviteLink(string $inviteLink)
 * @method static setCreator(User $creator)
 * @method static setCreatesJoinRequest(bool $createsJoinRequest)
 * @method static setIsPrimary(bool $isPrimary)
 * @method static setIsRevoked(bool $isRevoked)
 * @method static setName(?string $name)
 * @method static setExpireDate(?int $expireDate)
 * @method static setMemberLimit(?int $memberLimit)
 * @method static setPendingJoinRequestCount(?int $pendingJoinRequestCount)
 *
 * @see https://core.telegram.org/bots/api#chatinvitelink
 */
class ChatInviteLink extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'invite_link'                => FieldType::single('string'),
            'creator'                    => FieldType::single(User::class),
            'creates_join_request'       => FieldType::single('boolean'),
            'is_primary'                 => FieldType::single('boolean'),
            'is_revoked'                 => FieldType::single('boolean'),
            'name'                       => FieldType::optional('string'),
            'expire_date'                => FieldType::optional('integer'),
            'member_limit'               => FieldType::optional('integer'),
            'pending_join_request_count' => FieldType::optional('integer'),
        ];
    }
}
