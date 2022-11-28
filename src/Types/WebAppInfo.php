<?php

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

/**
 * Describes a Web App.
 * 
 * @see https://core.telegram.org/bots/api#webappinfo
 */
class WebAppInfo extends TypesBase implements TypesInterface
{
  public string $url;

  public function __construct(stdClass $up) {
    $this->setUrl($up->url);
  }

  public function setUrl(string $url): WebAppInfo
  {
    $this->url = $url;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}
