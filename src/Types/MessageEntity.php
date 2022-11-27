<?php 

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

/**
 * This object represents one special entity in a text message. For example, hashtags, usernames, URLs, etc.
 * 
 * @see https://core.telegram.org/bots/api#messageentity
 */
class MessageEntity extends TypesBase implements TypesInterface
{
  public string $type;
  public int $offset;
  public int $length;
  public ?string $url;
  public ?User $user;
  public ?string $language;
  public ?string $custom_emoji_id;

  public function __construct(?stdClass $up) {
    $this->setType($up->type)
      ->setOffset($up->offset)
      ->setLength($up->length)
      ->setUrl($up->url ?? self::DEFAULT_PARAM)
      ->setUser(User::create($up->user ?? self::DEFAULT_PARAM))
      ->setLanguage($up->language ?? self::DEFAULT_PARAM)
      ->setCustomEmojiId($up->custom_emoji_id ?? self::DEFAULT_PARAM);
  }

  public function setType(string $type): MessageEntity
  {
    $this->type = $type;
    return $this;
  }

  public function setOffset(int $offset): MessageEntity
  {
    $this->offset = $offset;
    return $this;
  }

  public function setLength(int $length): MessageEntity
  {
    $this->length = $length;
    return $this;
  }

  public function setUrl(?string $url): MessageEntity
  {
    $this->url = $url;
    return $this;
  }

  public function setUser(?User $user): MessageEntity
  {
    $this->user = $user;
    return $this;
  }

  public function setLanguage(?string $language): MessageEntity
  {
    $this->language = $language;
    return $this;
  }

  public function setCustomEmojiId(?string $customEmojiId): MessageEntity
  {
    $this->custom_emoji_id = $customEmojiId;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}
