<?php

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

/**
 * This object represents a service message about a video chat ended in the chat.
 * 
 * @see https://core.telegram.org/bots/api#videochatended
 */
class VideoChatEnded extends TypesBase implements TypesInterface
{
  public int $duration;

  public function __construct(stdClass $up) {
    $this->setDuration($up->duration);
  }

  public function setDuration(int $duration): VideoChatEnded
  {
    $this->duration = $duration;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}
