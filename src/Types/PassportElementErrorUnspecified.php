<?php

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

/**
 * Represents an issue in an unspecified place. The error is considered resolved when new data is added.
 * 
 * @see https://core.telegram.org/bots/api#passportelementerrorunspecified
 */
class PassportElementErrorUnspecified extends TypesBase implements TypesInterface
{
  public string $source, $type, $element_hash, $message;

  public function __construct(stdClass $up) {
    $this->setSource($up->source)
      ->setType($up->type)
      ->setElementHash($up->element_hash)
      ->setMessage($up->message);
  }

  public function setSource(string $source): PassportElementErrorUnspecified
  {
    $this->source = $source;
    return $this;
  }

  public function setType(string $type): PassportElementErrorUnspecified
  {
    $this->type = $type;
    return $this;
  }

  public function setElementHash(string $elementHash): PassportElementErrorUnspecified
  {
    $this->element_hash = $elementHash;
    return $this;
  }

  public function setMessage(string $message): PassportElementErrorUnspecified
  {
    $this->message = $message;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}
