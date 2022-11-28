<?php

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

/**
 * This object represents a service message about a new forum topic created in the chat.
 * 
 * @see https://core.telegram.org/bots/api#forumtopiccreated
 */
class ForumTopicCreated extends TypesBase implements TypesInterface
{
  public string $name;
  public int $icon_color;
  public ?string $icon_custom_emoji_id;

  public function __construct(stdClass $up) {
    $this->setName($up->name)
      ->setIconColor($up->icon_color)
      ->setIconCustomEmojiId($up->icon_custom_emoji_id ?? self::DEFAULT_PARAM);
  }

  public function setName(string $name): ForumTopicCreated
  {
    $this->name = $name;
    return $this;
  }

  public function setIconColor(int $iconColor): ForumTopicCreated
  {
    $this->icon_color = $iconColor;
    return $this;
  }

  public function setIconCustomEmojiId(?string $iconCustomEmojiId): ForumTopicCreated
  {
    $this->icon_custom_emoji_id = $iconCustomEmojiId;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}
