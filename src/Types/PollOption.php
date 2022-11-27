<?php

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

/**
 * This object contains information about one answer option in a poll.
 * 
 * @see https://core.telegram.org/bots/api#polloption
 */
class PollOption extends TypesBase implements TypesInterface
{
  public string $text;
  public int $voter_count;

  public function __construct(stdClass $up) {
    $this->setText($up->text)
      ->setVoterCount($up->voter_count);
  }

  public function setText(string $text): PollOption
  {
    $this->text = $text;
    return $this;
  }

  public function setVoterCount(int $voterCount): PollOption
  {
    $this->voter_count = $voterCount;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}
