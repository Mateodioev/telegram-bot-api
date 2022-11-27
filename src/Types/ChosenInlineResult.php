<?php

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

/**
 * Represents a result of an inline query that was chosen by the user and sent to their chat partner.
 * 
 * @see https://core.telegram.org/bots/api#choseninlineresult
 */
class ChosenInlineResult extends TypesBase implements TypesInterface
{
  public string $result_id;
  public User $from;
  public ?Location $location;
  public ?string $inline_message_id;
  public string $query;

  public function __construct(stdClass $up) {
    $this->setResultId($up->result_id)
      ->setFrom(User::create($up->from))
      ->setLocation(Location::create($up->location ?? self::DEFAULT_PARAM))
      ->setInlineMessageId($up->inline_message_id ?? self::DEFAULT_PARAM)
      ->setQuery($up->query);
  }

  public function setResultId(string $resultId): ChosenInlineResult
  {
    $this->result_id = $resultId;
    return $this;
  }
  
  public function setFrom(User $from): ChosenInlineResult
  {
    $this->from = $from;
    return $this;
  }

  public function setLocation(?Location $location): ChosenInlineResult
  {
    $this->location = $location;
    return $this;
  }

  public function setInlineMessageId(?string $inlineMessageId): ChosenInlineResult
  {
    $this->inline_message_id = $inlineMessageId;
    return $this;
  }

  public function setQuery(string $query): ChosenInlineResult
  {
    $this->query = $query;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}
