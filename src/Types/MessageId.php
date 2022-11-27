<?php

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

/**
 * This object represents a unique message identifier.
 * 
 * @see https://core.telegram.org/bots/api#messageid
 */
class MessageId extends TypesBase implements TypesInterface
{
  public int $message_id;

  public function __construct(stdClass $up) {
    $this->setMessageId($up->message_id);
  }

  public function setMessageId(int $messageId): MessageId
  {
    $this->message_id = $messageId;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}
