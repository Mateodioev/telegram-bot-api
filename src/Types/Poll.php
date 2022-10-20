<?php 

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Exception\TelegramParamException;

use function strlen, count, json_encode;

class Poll extends TypesInterface
{
  public array $answers = [];
  public ?int $correctOption = null;

  public static function create()
  {
    return new self();
  }

  /**
   * @param boolean $isCorrectOption Pass true if the option is correct, only valid in poll in quiz mode
   */
  public function addAnswer(string $param, bool $isCorrectOption = false): Poll
  {
    if (empty($param) || strlen($param) > 100) {
      throw new TelegramParamException('Invalid poll answer');
    }

    $this->answers[] = $param;
    if ($isCorrectOption) {
      $this->correctOption = count($this->answers) - 1;
    }
    return $this;
  }

  public function getCorrectId(): ?int
  {
    return $this->correctOption;
  }

  public function get()
  {
    if (count($this->answers) > 2) {
      throw new TelegramParamException('Add more than two answers');
    }

    return json_encode($this->answers);
  }
}
