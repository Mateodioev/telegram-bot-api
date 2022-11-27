<?php

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

// TODO: terminado

/**
 * Describes data sent from a Web App to the bot.
 * 
 * @see https://core.telegram.org/bots/api#webappdata
 */
class WebAppData extends TypesBase implements TypesInterface
{
  public string $data;
  public string $button_text;

  public function __construct(stdClass $up) {
    $this->setData($up->data)
      ->setButtonText($up->button_text);
  }

  public function setData(string $data): WebAppData
  {
    $this->data = $data;
    return $this;
  }

  public function setButtonText(string $buttonText): WebAppData
  {
    $this->button_text = $buttonText;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}
