<?php

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

/**
 * This object contains information about a poll.
 * 
 * @see https://core.telegram.org/bots/api#poll
 */
class Poll extends TypesBase implements TypesInterface
{
  public string $id;
  public string $question;
  public array $options;
  public int $total_voter_count;
  public bool $is_closed;
  public bool $is_anonymous;
  public string $type;
  public bool $allows_multiple_answers;
  public ?int $correct_option_id;
  public ?string $explanation;
  public ?array $explanation_entities;
  public ?int $open_period;
  public ?int $close_date;

  public function __construct(stdClass $up) {
    $this->setId($up->id)
      ->setQuestion($up->question)
      ->setOptions(PollOption::bulkCreate($up->options))
      ->setTotalVoterCount($up->total_voter_count)
      ->setIsClosed($up->is_closed ?? self::DEFAULT_BOOL)
      ->setIsAnonymous($up->is_anonymous ?? self::DEFAULT_BOOL)
      ->setType($up->type)
      ->setAllowsMultipleAnswers($up->allows_multiple_answers ?? self::DEFAULT_BOOL)
      ->setCorrectOptionId($up->correct_option_id ?? self::DEFAULT_PARAM)
      ->setExplanation($up->explanation ?? self::DEFAULT_PARAM)
      ->setExplanationEntities(MessageEntity::bulkCreate($up->explanation_entities ?? self::DEFAULT_PARAM))
      ->setCloseDate($up->close_date ?? self::DEFAULT_PARAM);
  }

  public function setId(string $id): Poll
  {
    $this->id = $id;
    return $this;
  }

  public function setQuestion(string $question): Poll
  {
    $this->question = $question;
    return $this;
  }

  public function setOptions(array $options): Poll
  {
    $this->options = $options;
    return $this;
  }

  public function setTotalVoterCount(int $totalVoterCount): Poll
  {
    $this->total_voter_count = $totalVoterCount;
    return $this;
  }
  
  public function setIsClosed(bool $isClosed): Poll
  {
    $this->is_closed = $isClosed;
    return $this;
  }

  public function setIsAnonymous(bool $isAnonymous): Poll
  {
    $this->is_anonymous = $isAnonymous;
    return $this;
  }

  public function setType(string $type): Poll
  {
    $this->type = $type;
    return $this;
  }

  public function setAllowsMultipleAnswers(bool $allowsMultipleAnswers): Poll
  {
    $this->allows_multiple_answers = $allowsMultipleAnswers;
    return $this;
  }

  public function setCorrectOptionId(?int $correctOptionId): Poll
  {
    $this->correct_option_id = $correctOptionId;
    return $this;
  }

  public function setExplanation(?string $explanation): Poll
  {
    $this->explanation = $explanation;
    return $this;
  }

  public function setExplanationEntities(?array $explanationEntities): Poll
  {
    $this->explanation_entities = $explanationEntities;
    return $this;
  }
  
  public function setOpenPeriod(?int $openPeriod): Poll
  {
    $this->open_period = $openPeriod;
    return $this;
  }

  public function setCloseDate(?int $closeDate): Poll
  {
    $this->close_date = $closeDate;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}
