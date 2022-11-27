<?php

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

/**
 * This class is returned when an error occurs.
 */
class Error extends TypesBase implements TypesInterface
{
  public bool $ok = false;
  public ?int $error_code;
  public ?string $description;

  public function __construct(stdClass $up) {
    $this->setOk($up->ok ?? self::DEFAULT_BOOL)
      ->setErrorCode($up->error_code ?? self::DEFAULT_PARAM)
      ->setDescripion($up->description ?? self::DEFAULT_PARAM);
  }

  public function setOk(bool $ok): Error
  {
    $this->ok = $ok;
    return $this;
  }

  public function setErrorCode(?int $errorCode): Error
  {
    $this->error_code = $errorCode;
    return $this;
  }

  public function setDescripion(?string $description): Error
  {
    $this->description = $description;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}
