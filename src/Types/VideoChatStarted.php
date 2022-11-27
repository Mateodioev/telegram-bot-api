<?php

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

/**
 * This object represents a service message about a video chat started in the chat. Currently holds no information.
 * 
 * @see https://core.telegram.org/bots/api#videochatstarted
 */
class VideoChatStarted extends TypesBase implements TypesInterface
{
 
  public function __construct(stdClass $up) {
    
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}
