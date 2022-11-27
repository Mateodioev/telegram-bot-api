<?php

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

/**
 * Upon receiving a message with this object, Telegram clients will remove the current custom keyboard and display the default letter-keyboard.
 * By default, custom keyboards are displayed until a new keyboard is sent by a bot. An exception is made for one-time keyboards that are hidden immediately after the user presses a button (see ReplyKeyboardMarkup).
 * 
 * @see https://core.telegram.org/bots/api#replykeyboardremove
 */
class ReplyKeyboardRemove extends TypesBase implements TypesInterface
{
  public bool $remove_keyboard;
  public ?bool $selective;

  public function __construct(stdClass $up) {
    $this->setRemoveKeyboard($up->remove_keyboard)
      ->setSelective($up->selective ?? self::DEFAULT_PARAM);
  }

  public function setRemoveKeyboard(bool $remove_keyboard): ReplyKeyboardRemove
  {
    $this->remove_keyboard = $remove_keyboard;
    return $this;
  }

  public function setSelective(?bool $selective): ReplyKeyboardRemove
  {
    $this->selective = $selective;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}
