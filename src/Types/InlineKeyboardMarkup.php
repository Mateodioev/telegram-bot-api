<?php

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

/**
 * This object represents an inline keyboard that appears right next to the message it belongs to.
 * 
 * @see https://core.telegram.org/bots/api#inlinekeyboardmarkup
 */
class InlineKeyboardMarkup extends TypesBase implements TypesInterface
{
  public array $inline_keyboard;

  public function __construct(stdClass $up) {
    $this->setInlineKeyboard(InlineKeyboardButton::bulkCreate($up->inline_keyboard));
  }

  public function setInlineKeyboard(array $inline_keyboard): InlineKeyboardMarkup
  {
    $this->inline_keyboard = $inline_keyboard;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}
