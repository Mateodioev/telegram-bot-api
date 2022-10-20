<?php 

namespace Mateodioev\Bots\Telegram\Types;

use stdClass;

class ApiError extends TypesBase implements TypesInterface
{
  public bool $ok = false;
  public int $error_code = 0;
  public string $description = '';

  public function __construct(stdClass $error) {
    $this->setOk($error->ok ?? false)
      ->setErrorCode($error->error_code ?? 0)
      ->setDescripion($error->description ?? '');
  }

  public static function create(?stdClass $error): ?ApiError
  {
    if (is_null($error)) return null;

    return new self($error);
  }

  public function setOk(bool $ok): ApiError
  {
    $this->ok = $ok;
    return $this;
  }

  public function setErrorCode(int $errorCode): ApiError
  {
    $this->error_code = $errorCode;
    return $this;
  }

  public function setDescripion(string $description): ApiError
  {
    $this->description = $description;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}
