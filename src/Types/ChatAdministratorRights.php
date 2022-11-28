<?php

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

/**
 * Represents the rights of an administrator in a chat.
 * 
 * @see https://core.telegram.org/bots/api#chatadministratorrights
 */
class ChatAdministratorRights extends TypesBase implements TypesInterface
{
  public bool $is_anoymous;
  public bool $can_manage_chat;
  public bool $can_delete_messages;
  public bool $can_manage_video_chats;
  public bool $can_restrict_members;
  public bool $can_promote_members;
  public bool $can_change_info;
  public bool $can_invite_users;
  public bool $can_post_messages;
  public bool $can_edit_messages;
  public bool $can_pin_messages;
  public bool $can_manage_topics;

  public function __construct(stdClass $up) {
    $this->setIsAnoymous($up->is_anoymous ?? self::DEFAULT_BOOL)
      ->setCanManageChat($up->can_manage_chat ?? self::DEFAULT_BOOL)
      ->setCanDeleteMessages($up->can_delete_messages ?? self::DEFAULT_BOOL)
      ->setCanManageVideoChats($up->can_manage_video_chats ?? self::DEFAULT_BOOL)
      ->setCanRestrictMembers($up->can_restrict_members ?? self::DEFAULT_BOOL)
      ->setCanPromoteMembers($up->can_promote_members ?? self::DEFAULT_BOOL)
      ->setCanChangeInfo($up->can_change_info ?? self::DEFAULT_BOOL)
      ->setCanInviteUsers($up->can_invite_users ?? self::DEFAULT_BOOL)
      ->setCanPostMessages($up->can_post_messages ?? self::DEFAULT_BOOL)
      ->setCanEditMessages($up->can_edit_messages ?? self::DEFAULT_BOOL)
      ->setCanPinMessages($up->can_pin_messages ?? self::DEFAULT_BOOL);
  }

  public function setIsAnoymous(bool $is_anoymous): ChatAdministratorRights
  {
    $this->is_anoymous = $is_anoymous;
    return $this;
  }

  public function setCanManageChat(bool $can_manage_chat): ChatAdministratorRights
  {
    $this->can_manage_chat = $can_manage_chat;
    return $this;
  }

  public function setCanDeleteMessages(bool $can_delete_messages): ChatAdministratorRights
  {
    $this->can_delete_messages = $can_delete_messages;
    return $this;
  }

  public function setCanManageVideoChats(bool $can_manage_video_chats): ChatAdministratorRights
  {
    $this->can_manage_video_chats = $can_manage_video_chats;
    return $this;
  }

  public function setCanRestrictMembers(bool $can_restrict_members): ChatAdministratorRights
  {
    $this->can_restrict_members = $can_restrict_members;
    return $this;
  }

  public function setCanPromoteMembers(bool $can_promote_members): ChatAdministratorRights
  {
    $this->can_promote_members = $can_promote_members;
    return $this;
  }

  public function setCanChangeInfo(bool $can_change_info): ChatAdministratorRights
  {
    $this->can_change_info = $can_change_info;
    return $this;
  }

  public function setCanInviteUsers(bool $can_invite_users): ChatAdministratorRights
  {
    $this->can_invite_users = $can_invite_users;
    return $this;
  }

  public function setCanPostMessages(bool $can_post_messages): ChatAdministratorRights
  {
    $this->can_post_messages = $can_post_messages;
    return $this;
  }

  public function setCanEditMessages(bool $can_edit_messages): ChatAdministratorRights
  {
    $this->can_edit_messages = $can_edit_messages;
    return $this;
  }

  public function setCanPinMessages(bool $can_pin_messages): ChatAdministratorRights
  {
    $this->can_pin_messages = $can_pin_messages;
    return $this;
  }

  public function setCanManageTopics(bool $can_manage_topics): ChatAdministratorRights
  {
    $this->can_manage_topics = $can_manage_topics;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}
