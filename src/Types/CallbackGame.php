<?php

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

/**
 * A placeholder, currently holds no information. Use BotFather to set up your game.
 * 
 * @see https://core.telegram.org/bots/api#callbackgame
 */
class CallbackGame extends TypesBase implements TypesInterface
{
  public function __construct(stdClass $up) {
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}
