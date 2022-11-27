<?php

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

/**
 * This object represents type of a poll, which is allowed to be created and sent when the corresponding button is pressed.
 * 
 * @see https://core.telegram.org/bots/api#keyboardbuttonpolltype
 */
class KeyboardButtonPollType extends TypesBase implements TypesInterface
{
  public ?string $type;

  public function __construct(stdClass $up) {
    $this->setType($up->type ?? self::DEFAULT_PARAM);
  }

  public function setType(?string $type): KeyboardButtonPollType
  {
    $this->type = $type;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}
