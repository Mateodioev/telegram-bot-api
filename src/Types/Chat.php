<?php 

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

/**
 * This object represents a chat.
 * 
 * @see https://core.telegram.org/bots/api#chat
 */
class Chat extends TypesBase implements TypesInterface
{
  public int $id;
  public string $type;
  public ?string $title;
  public ?string $username;
  public ?string $first_name;
  public ?string $last_name;
  public ?bool $is_forum = self::DEFAULT_BOOL; //
  public ?ChatPhoto $photo;
  public ?array $active_usernames = self::DEFAULT_PARAM;//
  public ?string $emoji_status_custom_emoji_id = self::DEFAULT_PARAM;//
  public ?string $bio;
  public bool $has_private_forwards = self::DEFAULT_BOOL;
  public bool $has_restricted_voice_and_video_messages = self::DEFAULT_BOOL;
  public bool $join_to_send_messages = self::DEFAULT_BOOL;
  public bool $join_by_request = self::DEFAULT_BOOL;
  public ?string $description;
  public ?string $invite_link;
  public ?Message $pinned_message;
  public ?ChatPermissions $permissions;
  public ?int $slow_mode_delay;
  public ?int $message_auto_delete_time;
  public bool $has_protected_content = self::DEFAULT_BOOL;
  public ?string $sticker_set_name;
  public bool $can_set_sticker_set;
  public ?int $linked_chat_id;
  public ?ChatLocation $location;

  public function __construct(stdClass $up) {
    $this->setId($up->id)
      ->setType($up->type)
      ->setTitle($up->title ?? self::DEFAULT_PARAM)
      ->setUsername($up->username ?? self::DEFAULT_PARAM)
      ->setFirstName($up->first_name ?? self::DEFAULT_PARAM)
      ->setLastName($up->last_name ?? self::DEFAULT_PARAM)
      ->setIsForum($up->is_forum ?? self::DEFAULT_BOOL)
      ->setPhoto(ChatPhoto::create($up->photo ?? self::DEFAULT_PARAM))
      ->setActiveUsernames($up->active_usernames ?? self::DEFAULT_PARAM)
      ->setEmojiStatusCustomEmojiId($up->emoji_status_custom_emoji_id ?? self::DEFAULT_PARAM)
      ->setBio($up->bio ?? self::DEFAULT_PARAM)
      ->setHasPrivateForwards($up->has_private_forwards ?? self::DEFAULT_BOOL)
      ->setHasRestrictedVoiceAndVideoMessages($up->has_restricted_voice_and_video_messages ?? self::DEFAULT_BOOL)
      ->setJoinToSendMessages($up->join_to_send_messages ?? self::DEFAULT_BOOL)
      ->setJoinByRequest($up->join_by_request ?? self::DEFAULT_BOOL)
      ->setDescription($up->description ?? self::DEFAULT_PARAM)
      ->setInviteLink($up->invite_link ?? self::DEFAULT_PARAM)
      ->setPinnedMessage(Message::create($up->pinned_message ?? self::DEFAULT_PARAM))
      ->setPermissions(ChatPermissions::create($up->permissions ?? self::DEFAULT_PARAM))
      ->setSlowModeDelay($up->slow_mode_delay ?? self::DEFAULT_PARAM)
      ->setMessageAutoDeleteTime($up->message_auto_delete_time ?? self::DEFAULT_PARAM)
      ->setHasProtectedContent($up->has_protected_content ?? self::DEFAULT_BOOL)
      ->setStickerSetName($up->sticker_set_name ?? self::DEFAULT_PARAM)
      ->setCanSetStickerSet($up->can_set_sticker_set ?? self::DEFAULT_BOOL)
      ->setLinkedChatId($up->linked_chat_id ?? self::DEFAULT_PARAM)
      ->setLocation(ChatLocation::create($up->location ?? self::DEFAULT_PARAM));
  }

  public function setId(int $id): Chat
  {
    $this->id = $id;
    return $this;
  }

  public function setType(string $type): Chat
  {
    $this->type = $type;
    return $this;
  }

  public function setTitle(?string $title): Chat
  {
    $this->title = $title;
    return $this;
  }

  public function setUsername(?string $username): Chat
  {
    $this->username = $username;
    return $this;
  }

  public function setFirstName(?string $firstName): Chat
  {
    $this->first_name = $firstName;
    return $this;
  }

  public function setLastName(?string $lastName): Chat
  {
    $this->last_name = $lastName;
    return $this;
  }

  public function setIsForum(?bool $isForum): Chat
  {
    $this->is_forum = $isForum;
    return $this;
  }

  public function setPhoto(?ChatPhoto $photo): Chat
  {
    $this->photo = $photo;
    return $this;
  }

  public function setActiveUsernames(?array $activeUsernames): Chat
  {
    $this->active_usernames = $activeUsernames;
    return $this;
  }

  public function setEmojiStatusCustomEmojiId(?string $emojiStatusCustomEmojiId): Chat
  {
    $this->emoji_status_custom_emoji_id = $emojiStatusCustomEmojiId;
    return $this;
  }

  public function setBio(?string $bio): Chat
  {
    $this->bio = $bio;
    return $this;
  }

  public function setHasPrivateForwards(bool $hasPrivateForwards): Chat
  {
    $this->has_private_forwards = $hasPrivateForwards;
    return $this;
  }

  public function setHasRestrictedVoiceAndVideoMessages(bool $hasRestrictedVoiceAndVideoMessages): Chat
  {
    $this->has_restricted_voice_and_video_messages = $hasRestrictedVoiceAndVideoMessages;
    return $this;
  }

  public function setJoinToSendMessages(bool $joinToSendMessages): Chat
  {
    $this->join_to_send_messages = $joinToSendMessages;
    return $this;
  }

  public function setJoinByRequest(bool $joinByRequest): Chat
  {
    $this->join_by_request = $joinByRequest;
    return $this;
  }

  public function setDescription(?string $description): Chat
  {
    $this->description = $description;
    return $this;
  }

  public function setInviteLink(?string $inviteLink): Chat
  {
    $this->invite_link = $inviteLink;
    return $this;
  }
  
  public function setPinnedMessage(?Message $pinnedMessage): Chat
  {
    $this->pinned_message = $pinnedMessage;
    return $this;
  }

  public function setPermissions(?ChatPermissions $permissions): Chat
  {
    $this->permissions = $permissions;
    return $this;
  }

  public function setSlowModeDelay(?int $slowModeDelay): Chat
  {
    $this->slow_mode_delay = $slowModeDelay;
    return $this;
  }

  public function setMessageAutoDeleteTime(?int $messageAutoDeleteTime): Chat
  {
    $this->message_auto_delete_time = $messageAutoDeleteTime;
    return $this;
  }

  public function setHasProtectedContent(bool $hasProtectedContent): Chat
  {
    $this->has_protected_content = $hasProtectedContent;
    return $this;
  }

  public function setStickerSetName(?string $stickerSetName): Chat
  {
    $this->sticker_set_name = $stickerSetName;
    return $this;
  }

  public function setCanSetStickerSet(bool $canSetTickerSet): Chat
  {
    $this->can_set_sticker_set = $canSetTickerSet;
    return $this;
  }

  public function setLinkedChatId(?int $linkedChatId): Chat
  {
    $this->linked_chat_id = $linkedChatId;
    return $this;
  }

  public function setLocation(?ChatLocation $location): Chat
  {
    $this->location = $location;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}
