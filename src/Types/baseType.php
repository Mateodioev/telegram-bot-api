<?php

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\Types as TypeConfig;
use Mateodioev\Bots\Telegram\Exception\TelegramParamException;
use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

/**
 * Summary of baseType
 */
abstract class baseType implements TypesInterface
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

    public function getField(string $fieldName)
    {
        return $this->fields[$fieldName] ?? self::DEFAULT_PARAM;
    }

    /**
     * Get field type
     */
    public function getFieldType(string $fieldName): string
    {
        $type = $this->getField($fieldName);
        if (is_array($type)) $type = $type[0];

        return $type;
    }

    public function isMany(string $fieldName): bool
    {
        return is_array($this->getField($fieldName));
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


        if (is_array($fieldData)) {
            $this->__set($key, $value);
            return $this;
        }

        $fieldType = $this->getFieldType($key);

        // Check scalar values
        if ($valueType != 'object' && $fieldType == $valueType) {
            $this->__set($key, $value);
            return $this;
        }
        // check objects
        if ($value instanceof $fieldType) {
            $this->__set($key, $value);
            return $this;
        }

        $format = 'Invalid value for property %s, expected %s given %s.';
        throw new TelegramParamException(sprintf(
            $format,
            $key,
            $fieldType,
            $valueType
        ));
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

    public function __call($name, $values): mixed
    {
        $fieldName = strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $name));

        // set new field
        if (strpos($fieldName, 'set') === 0) {
            $fieldName = substr($fieldName, 4);

            return $this->fluentSetter($fieldName, $values[0]);
        }

        // get field name
        return $this->getter($fieldName);
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

    /**
     * Clone fields key into array
     * Warning: this method reset all propertie values
     */
    public function cloneFields(): static
    {
        foreach ($this->fields as $key => $_) {
            $this->properties[$key] = ($this->getFieldType($key) == 'boolean')
                ? self::DEFAULT_BOOL
                : self::DEFAULT_PARAM;
        }

        return $this;
    }

    public function __construct() {
        $this->cloneFields();
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

    public static function create(?stdClass $up)
    {
        if (is_null($up)) return self::DEFAULT_PARAM;

        return self::createFromArray(get_object_vars($up));
    }

    public static function createFromType(TypesInterface $up)
    {
        return self::createFromArray($up->get());
    }

    public static function createFromArray(?array $up)
    {
        if (is_null($up)) return self::DEFAULT_PARAM;

        $instance = new static; // only use here

        foreach ($up as $key => $value) {
            // only for scalar, check
            $type = $instance->getFieldType($key);

            if (is_subclass_of($type, TypesInterface::class)) {
                $field = $instance->getField($key);

                if (is_array($field)) {
                    // create new object
                    $value = $field[0]::bulkCreate((array) $value);
                } elseif ($value instanceof TypesInterface) {
                    $value = $field::createFromType($value);
                } else {
                    $value = $field::createFromArray((array) $value);
                }
            }
            $instance->fluentSetter($key, $value);
        }

        return $instance;
    }

    public static function bulkCreate(?array $up): ?array
    {
        if (is_null($up)) return self::DEFAULT_PARAM;

        return array_map(function ($update) {
            if ($update instanceof stdClass) {
                return self::create($update);
            } elseif (is_array($update) || is_null($update)) {
                return self::createFromArray($update);
            } elseif($update instanceof TypesInterface) {
                return self::createFromType($update);
            } else {
                throw new TelegramParamException('Invalid update');
            }
        }, $up);
    }
}
