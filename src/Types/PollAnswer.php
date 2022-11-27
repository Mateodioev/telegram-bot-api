<?php

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

/**
 * This object represents an answer of a user in a non-anonymous poll.
 * 
 * @see https://core.telegram.org/bots/api#pollanswer
 */
class PollAnswer extends TypesBase implements TypesInterface
{
  public string $poll_id;
  public User $user;
  public array $option_ids;

  public function __construct(stdClass $up) {
    $this->setPollId($up->poll_id)
      ->setUser(User::create($up->user))
      ->setOptionIds($up->option_ids);
  }

  public function setPollId(string $pollId): PollAnswer
  {
    $this->poll_id = $pollId;
    return $this;
  }

  public function setUser(User $user): PollAnswer
  {
    $this->user = $user;
    return $this;
  }

  public function setOptionIds(array $optionIds): PollAnswer
  {
    $this->option_ids = $optionIds;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}
