<?php 

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

/**
 * Describes actions that a non-administrator user is allowed to take in a chat.
 * 
 * @see https://core.telegram.org/bots/api#chatpermissions
 */
class ChatPermissions extends TypesBase implements TypesInterface
{
  public const DEFAULT_PERMISSION = false;

  public ?bool $can_send_messages;
  public ?bool $can_send_media_messages;
  public ?bool $can_send_polls;
  public ?bool $can_send_other_messages;
  public ?bool $can_add_web_page_previews;
  public ?bool $can_change_info;
  public ?bool $can_invite_users;
  public ?bool $can_pin_messages;
  public ?bool $can_manage_topic;

  public function __construct(?stdClass $up) {
    $this->setCanSendMessages($up->can_send_messages ?? self::DEFAULT_BOOL)
      ->setCanSendMediaMessages($up->can_send_media_messages ?? self::DEFAULT_BOOL)
      ->setCanSendPolls($up->can_send_polls ?? self::DEFAULT_BOOL)
      ->setCanSendOtherMessages($up->can_send_other_messages ?? self::DEFAULT_BOOL)
      ->setCanAddWebPagePreviews($up->can_add_web_page_previews ?? self::DEFAULT_BOOL)
      ->setCanChangeInfo($up->can_change_info ?? self::DEFAULT_BOOL)
      ->setCanInviteUsers($up->can_invite_users ?? self::DEFAULT_BOOL)
      ->setCanPinMessages($up->can_pin_messages ?? self::DEFAULT_BOOL)
      ->setCanManageTopics($up->can_manage_topic ?? self::DEFAULT_BOOL);
  }

  public function setCanSendMessages(bool $canSendMessages): ChatPermissions
  {
    $this->can_send_messages = $canSendMessages;
    return $this;
  }

  public function setCanSendMediaMessages(bool $canSendMediaMessages): ChatPermissions
  {
    $this->can_send_media_messages = $canSendMediaMessages;
    return $this;
  }

  public function setCanSendPolls(bool $canSendPolls): ChatPermissions
  {
    $this->can_send_polls = $canSendPolls;
    return $this;
  }

  public function setCanSendOtherMessages(bool $canSendOtherMessages): ChatPermissions
  {
    $this->can_send_other_messages = $canSendOtherMessages;
    return $this;
  }

  public function setCanAddWebPagePreviews(bool $canAddWebPagePreviews): ChatPermissions
  {
    $this->can_add_web_page_previews = $canAddWebPagePreviews;
    return $this;
  }

  public function setCanChangeInfo(bool $canChangeInfo): ChatPermissions
  {
    $this->can_change_info = $canChangeInfo;
    return $this;
  }

  public function setCanInviteUsers(bool $canInviteUsers): ChatPermissions
  {
    $this->can_invite_users = $canInviteUsers;
    return $this;
  }

  public function setCanPinMessages(bool $canPingMessages): ChatPermissions
  {
    $this->can_pin_messages = $canPingMessages;
    return $this;
  }

  public function setCanManageTopics(bool $canManageTopics): ChatPermissions
  {
    $this->can_manage_topic = $canManageTopics;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}
