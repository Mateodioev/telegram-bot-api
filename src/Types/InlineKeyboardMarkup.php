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
  /**
   * @var array<InlineKeyboardButton[]>
   */
  public array $inline_keyboard;

  public function __construct(stdClass $up) {
    $keyboard = [];
    // Support for array in arrays
    foreach ($up->inline_keyboard as $inline_keyboard) {
      $keyboard[] = InlineKeyboardButton::bulkCreate($inline_keyboard);
    }
    $this->setInlineKeyboard($keyboard);
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
