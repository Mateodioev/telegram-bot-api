<?php

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

// TODO: terminado

/**
 * This object represents a service message about a change in auto-delete timer settings.
 * 
 * @see https://core.telegram.org/bots/api#messageautodeletetimerchanged
 */
class MessageAutoDeleteTimerChanged extends TypesBase implements TypesInterface
{
  public int $message_auto_delete_time;

  public function __construct(stdClass $up) {
    $this->setMessageAutoDeleteTime($up->message_auto_delete_time);
  }

  public function setMessageAutoDeleteTime(int $messageAutoDeleteTime): MessageAutoDeleteTimerChanged
  {
    $this->message_auto_delete_time = $messageAutoDeleteTime;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}
