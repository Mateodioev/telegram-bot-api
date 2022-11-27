<?php 

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

/**
 * Represents a join request sent to a chat.
 * 
 * @see https://core.telegram.org/bots/api#chatjoinrequest
 */
class ChatJoinRequest extends TypesBase implements TypesInterface
{
  public Chat $chat;
  public User $from;
  public int $date;
  public ?string $bio;
  public ?ChatInviteLink $invite_link;

  public function __construct(stdClass $up) {
    $this->setChat(Chat::create($up->chat))
      ->setFrom(User::create($up->from))
      ->setDate($up->date)
      ->setBio($up->bio ?? self::DEFAULT_PARAM)
      ->setInviteLink(ChatInviteLink::create($up->invite_link ?? self::DEFAULT_PARAM));
  }

  public function setChat(Chat $chat): ChatJoinRequest {
    $this->chat = $chat;
    return $this;
  }

  public function setFrom(User $from): ChatJoinRequest
  {
    $this->from = $from;
    return $this;
  }

  public function setDate(int $date): ChatJoinRequest
  {
    $this->date = $date;
    return $this;
  }

  public function setBio(?string $bio): ChatJoinRequest
  {
    $this->bio = $bio;
    return $this;
  }
  
  public function setInviteLink(?ChatInviteLink $inviteLink): ChatJoinRequest
  {
    $this->invite_link = $inviteLink;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}