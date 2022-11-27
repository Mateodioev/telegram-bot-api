<?php

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

/**
 * This object represents one button of the reply keyboard. For simple text buttons String can be used instead of this object to specify text of the button.
 * Optional fields web_app, request_contact, request_location, and request_poll are mutually exclusive.
 * 
 * @see https://core.telegram.org/bots/api#keyboardbutton
 */
class KeyboardButton extends TypesBase implements TypesInterface
{
  public string $text;
  public ?bool $request_contact;
  public ?bool $request_location;
  public ?KeyboardButtonPollType $request_poll;
  public ?WebAppInfo $web_app;

  public function __construct(stdClass $up) {
    $this->setText($up->text)
      ->setRequestContact($up->request_contact ?? self::DEFAULT_PARAM)
      ->setRequestLocation($up->request_location ?? self::DEFAULT_PARAM)
      ->setRequestPoll(KeyboardButtonPollType::create($up->request_poll ?? self::DEFAULT_PARAM))
      ->setWebApp(WebAppInfo::create($up->web_app ?? self::DEFAULT_PARAM));
  }

  public function setText(string $text): KeyboardButton
  {
    $this->text = $text;
    return $this;
  }

  public function setRequestContact(?bool $request_contact): KeyboardButton
  {
    $this->request_contact = $request_contact;
    return $this;
  }

  public function setRequestLocation(?bool $request_location): KeyboardButton
  {
    $this->request_location = $request_location;
    return $this;
  }

  public function setRequestPoll(?KeyboardButtonPollType $request_poll): KeyboardButton
  {
    $this->request_poll = $request_poll;
    return $this;
  }

  public function setWebApp(?WebAppInfo $web_app): KeyboardButton
  {
    $this->web_app = $web_app;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}
