<?php 

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

class Response extends TypesBase implements TypesInterface
{
  public bool $ok = false;
  public ?int $error_code;
  public ?string $description;
  public mixed $result;

  public function __construct(stdClass $up) {
    $this->setOk($up->ok ?? self::DEFAULT_BOOL)
      ->setErrorCode($up->error_code ?? self::DEFAULT_PARAM)
      ->setDescripion($up->description ?? self::DEFAULT_PARAM)
      ->setResult($up->result ?? self::DEFAULT_PARAM);
  }

  public function setOk(bool $ok): Response
  {
    $this->ok = $ok;
    return $this;
  }

  public function setErrorCode(?int $errorCode): Response
  {
    $this->error_code = $errorCode;
    return $this;
  }

  public function setDescripion(?string $description): Response
  {
    $this->description = $description;
    return $this;
  }

  public function setResult(mixed $result): Response
  {
    if (empty($result)) $result = self::DEFAULT_PARAM;
    $this->result = $result;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}
