<?php 

namespace Mateodioev\Bots\Telegram\Methods;

use Mateodioev\Bots\Telegram\Exception\TelegramParamException;
use Mateodioev\Bots\Telegram\Interfaces\MethodInterface;
use Mateodioev\Bots\Telegram\Types\Response;

use function array_merge;

class Method implements MethodInterface
{
  private array $params;

  public string $method;
  public ?string $returnType = null;
  public bool $multipleResults = false;

  public function __construct(array $params = [], ?string $method = null) {
    $this->params = $params;
    if ($method) {
      $this->setMethod($method);
    }
    $this->setReturnType(Response::class);
  }

  public static function create(array $params = [], ?string $method = null): Method
  {
    return new self($params, $method);
  }

  public function addParam(string $key, mixed $value): Method
  {
    $this->params = [...$this->params, ...[$key => $value]];
    return $this;
  }

  public function addParams(array $params): Method
  {
    $this->params = array_merge($this->params, $params);
    return $this;
  }

  public function getParam(string $key)
  {
    return $this->params[$key]
      ?? throw new TelegramParamException("Param {$key} not found");
  }

  public function setMethod(string $method): Method
  {
    if (empty($method)) {
      throw new TelegramParamException('Method can\'t be empty');
      
    }
    $this->method = $method;
    return $this;
  }

  public function setReturnType(string $type, bool $multipleResults = false): Method
  {
    $this->returnType = $type;
    $this->multipleResults = $multipleResults;
    return $this;
  }

  public function getMethod(): string
  {
    return $this->method;
  }

  public function getReturn(): array
  {
    return [
      $this->returnType,
      $this->multipleResults
    ];
  }

  public function getParams(): array
  {
    return $this->params;
  }
}
