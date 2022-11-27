<?php 

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

/**
 * Represents an invite link for a chat.
 * 
 * @see https://core.telegram.org/bots/api#chatinvitelink
 */
class ChatInviteLink extends TypesBase implements TypesInterface
{
  public string $invite_link;
  public User $creator;
  public bool $create_join_request = self::DEFAULT_BOOL;
  public bool $is_primary = self::DEFAULT_BOOL;
  public bool $is_revoked = self::DEFAULT_BOOL;
  public ?string $name;
  public ?int $expire_date;
  public ?int $member_limit;
  public ?int $pending_join_request_count;

  public function __construct(stdClass $up) {
    $this->setInviteLink($up->invite_link)
      ->setCreator(User::create($up->creator ?? self::DEFAULT_PARAM))
      ->setCreateJoinRequest($up->create_join_request ?? self::DEFAULT_BOOL)
      ->setIsPrimary($up->is_primary ?? self::DEFAULT_BOOL)
      ->setIsRevoked($up->is_revoked ?? self::DEFAULT_BOOL)
      ->setName($up->name ?? self::DEFAULT_PARAM)
      ->setExpireDate($up->expire_date ?? self::DEFAULT_PARAM)
      ->setMemberLimit($up->member_limit ?? self::DEFAULT_PARAM)
      ->setPendingJoinRequestCount($up->pending_join_request_count ?? self::DEFAULT_PARAM);
  }

  public function setInviteLink(string $inviteLink): ChatInviteLink
  {
    $this->invite_link = $inviteLink;
    return $this;
  }

  public function setCreator(User $creator): ChatInviteLink
  {
    $this->creator = $creator;
    return $this;
  }

  public function setCreateJoinRequest(bool $createJoinRequest): ChatInviteLink
  {
    $this->create_join_request = $createJoinRequest;
    return $this;
  }

  public function setIsPrimary(bool $isPrimary): ChatInviteLink
  {
    $this->is_primary = $isPrimary;
    return $this;
  }

  public function setIsRevoked(bool $isRevoked): ChatInviteLink
  {
    $this->is_revoked = $isRevoked;
    return $this;
  }

  public function setName(?string $name): ChatInviteLink
  {
    $this->name = $name;
    return $this;
  }

  public function setExpireDate(?int $expireDate): ChatInviteLink
  {
    $this->expire_date = $expireDate;
    return $this;
  }

  public function setMemberLimit(?int $memberLimit): ChatInviteLink
  {
    $this->member_limit = $memberLimit;
    return $this;
  }

  public function setPendingJoinRequestCount(?int $pendingJoinRequestCount): ChatInviteLink
  {
    $this->pending_join_request_count = $pendingJoinRequestCount;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}
