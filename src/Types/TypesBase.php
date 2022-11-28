<?php 

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\Types as TypeConfig;
use Mateodioev\Bots\Telegram\Exception\TelegramParamException;
use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use ReflectionClass, ReflectionProperty, stdClass;

abstract class TypesBase
{
  public const DEFAULT_PARAM = null;
  public const DEFAULT_BOOL  = false;

  private function getProperty(string $property)
  {
    if (property_exists($this, $property)) {
      return $this->$property;
    }
    return self::DEFAULT_PARAM;
  }

  public function __call($name, $arguments)
  {
    $name = strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $name));
    $param = substr($name, 3);
    
    return $this->getProperty($param)
      ?? $this->getProperty($name)
      ?? throw new TelegramParamException("Param {$name} not found");
  }

  protected function getProperties(TypesInterface $type)
  {
    $obj = new ReflectionClass($type);

    $params = [];
    $props = $obj->getProperties(ReflectionProperty::IS_PUBLIC | ReflectionProperty::IS_PROTECTED);

    foreach ($props as $properties) {
      $key = $properties->getName();
      $value = $obj->getProperty($key)->getValue($type);

      if ($value instanceof TypesInterface) {
        $value = $value->get() ?? self::DEFAULT_PARAM;
      }
      if (TypeConfig::$returnNullParams === false && $value === self::DEFAULT_PARAM) {
        continue;
      }
      $params[$key] = $value;
    }

    return $params;
  }

  public static function create(?stdClass $up): ?static
  {
    if (is_null($up)) return self::DEFAULT_PARAM;

    return new static($up);
  }

  public static function bulkCreate(?array $up): ?array
  {
    if (is_null($up)) return self::DEFAULT_PARAM;
    
    return array_map(['static', 'create'], $up);
  }
}
