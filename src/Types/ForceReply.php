<?php

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

/**
 * Upon receiving a message with this object, Telegram clients will display a reply interface to the user (act as if the user has selected the bot's message and tapped 'Reply').
 * This can be extremely useful if you want to create user-friendly step-by-step interfaces without having to sacrifice privacy mode.
 * 
 * @see https://core.telegram.org/bots/api#forcereply
 */
class ForceReply extends TypesBase implements TypesInterface
{
  public bool $force_reply;
  public ?string $input_field_placeholder;
  public ?bool $selective;

  public function __construct(stdClass $up) {
    $this->setForceReply($up->force_reply ?? true)
      ->setInputFieldPlaceholder($up->input_field_placeholder ?? self::DEFAULT_PARAM)
      ->setSelective($up->selective ?? self::DEFAULT_PARAM);
  }

  public function setForceReply(bool $force_reply): ForceReply
  {
    $this->force_reply = $force_reply;
    return $this;
  }

  public function setInputFieldPlaceholder(?string $input_field_placeholder): ForceReply
  {
    $this->input_field_placeholder = $input_field_placeholder;
    return $this;
  }

  public function setSelective(?bool $selective): ForceReply
  {
    $this->selective = $selective;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}
