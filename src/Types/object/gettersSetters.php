<?php

namespace Mateodioev\Bots\Telegram\Types\object;

use Mateodioev\Bots\Telegram\Exception\TelegramParamException;
use Mateodioev\Bots\Telegram\Config\Types as TypeConfig;
use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use Mateodioev\Utils\Arrays;

use function is_array, explode, in_array, array_keys, gettype, sprintf, array_pop, count, implode, substr, array_map;

trait gettersSetters
{
    const DEFAULT_PARAM = null;
    const DEFAULT_BOOL = false;

    protected array $properties = [];

    /**
     * Example:
     * `[
     *      'id' => 'int',
     *      'from' => User::class
     *      'chat' => Chat::class,
     *      'location' => [PassportFile::class] // array of types
     * ]`
     */
    protected array $fields = [];

    public function __get($key) {
        return $this->properties[$key] ?? self::DEFAULT_PARAM;
    }

    public function __set($key, $value) {
        $this->properties[$key] = $value;
    }

    /**
     * Get property value, if not exist return DEFAULT_VALUE
     */
    private function getProperty(string $property): mixed
    {
        return $this->__get($property);
    }

    /**
     * Get all properties
     */
    public function properties(): array {
        return $this->properties;
    }

    public function getField(string $fieldName)
    {
        return $this->fields[$fieldName] ?? self::DEFAULT_PARAM;
    }

    /**
     * Get all fields
     */
    public function fields(): array {
        return $this->fields;
    }

    /**
     * Get field type, return empty array if not found
     * If support many last element is true
     */
    public function getFieldType(string $fieldName): array
    {
        $type = $this->getField($fieldName) ?? '';
        
        if (is_array($type)) $type = $type[0];
        
        $types = explode('|', $type);
        return Arrays::DeleteEmptyKeys($types);
    }

    /**
     * Set value property and check type
     */
    private function fluentSetter($key, $value): static
    {
        if (!in_array($key, array_keys($this->properties))) {
            throw new TelegramParamException("Param {$key} not found");
        }

        $valueType = gettype($value);
        $fieldData = $this->getField($key);


        // support for mixed types
        if (is_array($fieldData) || $fieldData == 'mixed') {
            $this->__set($key, $value);
            return $this;
        }

        $fieldType = $this->getFieldType($key);

        // Check scalar values
        if ($valueType != 'object' && in_array($valueType, $fieldType)) {
            $this->__set($key, $value);
            return $this;
        }

        // check objects
        if ($value instanceof $fieldType[0]) {
            $this->__set($key, $value);
            return $this;
        }

        $format = 'Invalid value for property %s, expected %s given %s.';
        throw new TelegramParamException(sprintf(
            $format,
            $key,
            $this->formatFieldsType($fieldType),
            $valueType
        ));
    }

    private function formatFieldsType(array $types): string
    {
        $last = array_pop($types);
        if (count($types) > 0) {
            return implode(', ', $types) . ' or ' . $last;
        } else {
            return $last;
        }
    }

    /**
     * Get property value, if not exists return null
     */
    private function getter($key): mixed
    {
        $param = substr($key, 4);
        $property = $this->getProperty($key)
            ?? $this->getProperty($param);
        
        if ($property === null && TypeConfig::$returnNullParams === false) {
            throw new TelegramParamException("Param {$key} not found");
        }

        return $property;
    }

    /**
     * Get all properties
     */
    protected function getProperties(): array
    {
        $params = [];

        foreach ($this->properties as $key => $value) {

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

    public function get()
    {
        return $this->getProperties();
    }

    /**
     * Iterate for all elements and use method get if is instance of TypesInterface
     */
    protected function recursiveGet(): array
    {
        $props = $this->getProperties();
        foreach ($props as $key => $value) {
            if (is_array($value)) {
                $value = array_map(function ($val) {
                    if ($val instanceof TypesInterface)
                        $val = $val->get();

                    return $val;
                }, $value);
            }
            $props[$key] = $value;
        }
        return $props;
    }
}
