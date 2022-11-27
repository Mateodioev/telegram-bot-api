<?php

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

/**
 * This object represents a service message about a video chat scheduled in the chat.
 * 
 * @see https://core.telegram.org/bots/api#videochatscheduled
 */
class VideoChatScheduled extends TypesBase implements TypesInterface
{
  public int $start_date;

  public function __construct(stdClass $up) {
    $this->setStartDate($up->start_date);
  }

  public function setStartDate(int $startDate): VideoChatScheduled
  {
    $this->start_date = $startDate;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}
