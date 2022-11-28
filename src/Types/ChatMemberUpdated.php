<?php

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

/**
 * This object represents changes in the status of a chat member.
 * 
 * @see https://core.telegram.org/bots/api#chatmemberupdated
 */
class ChatMemberUpdated extends TypesBase implements TypesInterface
{
  public Chat $chat;
  public User $from;
  public int $date;
  public ChatMember $old_chat_member;
  public ChatMember $new_chat_member;
  public ?ChatInviteLink $invite_link;

  public function __construct(stdClass $up)
  {
    $this->setChat(Chat::create($up->chat))
      ->setFrom(User::create($up->from))
      ->setDate($up->date)
      ->setOldChatMember(ChatMember::create($up->old_chat_member))
      ->setNewChatMember(ChatMember::create($up->new_chat_member))
      ->setInviteLink(ChatInviteLink::create($up->invite_link ?? self::DEFAULT_PARAM));
  }

  public function setChat(Chat $chat): ChatMemberUpdated
  {
    $this->chat = $chat;
    return $this;
  }

  public function setFrom(User $from): ChatMemberUpdated
  {
    $this->from = $from;
    return $this;
  }

  public function setDate(int $date): ChatMemberUpdated
  {
    $this->date = $date;
    return $this;
  }

  public function setOldChatMember(ChatMember $old_chat_member): ChatMemberUpdated
  {
    $this->old_chat_member = $old_chat_member;
    return $this;
  }

  public function setNewChatMember(ChatMember $new_chat_member): ChatMemberUpdated
  {
    $this->new_chat_member = $new_chat_member;
    return $this;
  }

  public function setInviteLink(ChatInviteLink $invite_link): ChatMemberUpdated
  {
    $this->invite_link = $invite_link;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}
