<?php

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

/**
 * This object represents a parameter of the inline keyboard button used to automatically authorize a user.
 * Serves as a great replacement for the Telegram Login Widget when the user is coming from Telegram. All the user needs to do is tap/click a button and confirm that they want to log in
 * 
 * @see https://core.telegram.org/bots/api#loginurl
 */
class LoginUrl extends TypesBase implements TypesInterface
{
  public string $url;
  public ?string $forward_text;
  public ?string $bot_username;
  public ?bool $request_write_access;

  public function __construct(stdClass $up) {
    $this->setUrl($up->url);
    $this->setForwardText($up->forward_text);
    $this->setBotUsername($up->bot_username);
    $this->setRequestWriteAccess($up->request_write_access);
  }

  public function setUrl(string $url): LoginUrl
  {
    $this->url = $url;
    return $this;
  }

  public function setForwardText(?string $forwardText): LoginUrl
  {
    $this->forward_text = $forwardText;
    return $this;
  }

  public function setBotUsername(?string $botUsername): LoginUrl
  {
    $this->bot_username = $botUsername;
    return $this;
  }

  public function setRequestWriteAccess(?bool $requestWriteAccess): LoginUrl
  {
    $this->request_write_access = $requestWriteAccess;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}
