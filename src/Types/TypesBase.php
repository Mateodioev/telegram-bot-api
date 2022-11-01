<?php 

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use ReflectionClass, ReflectionProperty, stdClass;

abstract class TypesBase
{
  public const DEFAULT_PARAM = null;

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
      $params[$key] = $value;
    }

    return $params;
  }

  public static function create(?stdClass $up): ?static
  {
    if (is_null($up)) return null;

    return new static($up);
  }

  public static function bulkCreate(?array $up): ?array
  {
    if (is_null($up)) return null;
    
    return array_map(['static', 'create'], $up);
  }
}
