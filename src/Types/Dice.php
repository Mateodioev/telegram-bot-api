<?php 

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

/**
 * This object represents an animated emoji that displays a random value.
 * 
 * @see https://core.telegram.org/bots/api#dice
 */
class Dice extends TypesBase implements TypesInterface
{
  public string $emoji;
  public int $value;

  public function __construct(stdClass $up) {
    $this->setEmoji($up->emoji)
      ->setValue($up->value);
  }

  public function setEmoji(string $emoji): Dice
  {
    $this->emoji = $emoji;
    return $this;
  }

  public function setValue(int $value): Dice
  {
    $this->value = $value;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}
