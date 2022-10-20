<?php 

namespace Mateodioev\Bots\Telegram\Types;

use ReflectionClass;
use ReflectionProperty;

abstract class TypesBase
{
  protected function getProperties(TypesInterface $type)
  {
    $obj = new ReflectionClass($type);

    $params = [];
    $props = $obj->getProperties(ReflectionProperty::IS_PUBLIC | ReflectionProperty::IS_PROTECTED);

    foreach ($props as $properties) {
      $key = $properties->getName();
      $value = $obj->getProperty($key)->getValue($type);

      if ($value instanceof TypesInterface) {
        $value = $value->get() ?? null;
      }
      $params[$key] = $value;
    }

    return $params;
  }
}
