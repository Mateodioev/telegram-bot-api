<?php

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, Types, strUtils};
use Mateodioev\Bots\Telegram\Exception\TelegramParamException;
use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;

use function json_encode;

abstract class abstractType implements TypesInterface
{
    public const DEFAULT_PARAM = null;
    public const DEFAULT_BOOL  = false;

    /** @var array<string, mixed> $properties Parsed properties */
    protected array $properties = [];

    /** @var array<string, FieldType> $fields Fields rules */
    protected array $fields = [];

    private array $legacyProperties = [
        'thumb'
    ];

    public static function create(?array $update): ?static
    {
        if ($update === null) {
            return self::DEFAULT_PARAM;
        }

        return new static($update);
    }

    public static function default(): static
    {
        return new static();
    }

    public static function bulkCreate(?array $up): ?array
    {
        if ($up === null) {
            return self::DEFAULT_PARAM;
        }

        return array_map(function ($update) {
            if (is_array($update) || is_null($update)) {
                return self::create($update);
            } elseif ($update instanceof TypesInterface) {
                return $update;
            } else {
                throw new TelegramParamException('Invalid update');
            }
        }, $up);
    }

    /**
     * Convert arrays of types to json-object
     * @param TypesInterface[] $types
     */
    public static function bulkToJson(array $types): string
    {
        return json_encode(
            \array_map(fn (TypesInterface $type) => $type->getReduced(), $types) // Convert types to array
        );
    }

    public function __construct(?array $args = null)
    {
        $this->boot();
        $this->cloneFields();

        if ($args !== null) {
            $this->magicSetter($args);
        }
    }

    /**
     * Init fields
     */
    abstract protected function boot(): void;

    /**
     * Magic setter
     */
    public function __set($key, $value)
    {
        $this->fluentSetter($key, $value);
    }

    /**
     * Magic getter
     */
    public function __get($key)
    {
        return $this->properties[$key] ?? self::DEFAULT_PARAM;
    }

    /**
     * Magic setter and getter
     */
    public function __call($name, $arguments)
    {
        $fieldName = strUtils::toSnakeCase($name);

        if (str_starts_with($fieldName, 'set')) {
            $fieldName = substr($fieldName, 4);
            return $this->fluentSetter($fieldName, $arguments[0]);
        }

        return $this->getter($fieldName);
    }

    /**
     * var_dump properties
     */
    public function __debugInfo()
    {
        return $this->properties;
    }

    /**
     * Get all properties
     */
    public function properties(): array
    {
        return $this->properties;
    }

    /**
     * Get all fields
     */
    public function fields(): array
    {
        return $this->fields;
    }

    /**
     * Get all properties as array
     */
    public function get(): array
    {
        return $this->getProperties();
    }

    public function getReduced(): array
    {
        $up = $this->get();

        return _filter_update($up);
    }

    /**
     * Return all properties as json
     * @see self::get()
     *
     * @param integer $flags {@see json_encode} Flags
     */
    public function toString(int $flags = 0): string
    {
        return json_encode($this->get(), $flags);
    }

    /**
     * @internal
     */
    public function magicSetter(array $values): static
    {
        foreach ($values as $key => $value) {
            // Check if property exists
            if ($this->existsProperty($key) === false && $this->isLegacyProperty($key) === false) {
                if (Types::$throwOnFail === false) {
                    continue;
                } else { // Throw exception if property not exists
                    throw new TelegramParamException('Param ' . $key . ' not found in ' . $this::class);
                }
            }

            $field = $this->fields[$key] ?? FieldType::mixed();

            if ($field->allowArrays() && is_array($value) && is_array($value[0]) && in_array($key, ['inline_keyboard', 'keyboard'])) {
                $className = $field->customType ?? $field->getType();

                $value = array_map(function ($val) use ($className) {
                    if ($val instanceof TypesInterface) {
                        return $val;
                    }
                    return $className::bulkCreate($val);
                }, $value);

                $this->properties[$key] = $value;
                continue;
            }
            if ($field->isScalar() === false) {
                $className = $field->customType ?? $field->getType();

                if ($field->allowArrays()) {
                    $value = $className::bulkCreate($value);
                } elseif ($value instanceof TypesInterface) {
                    // continue;
                } else {
                    $value = $className::create($value);
                }
            }

            $this->checkIfPropertyMatchValues($key, $value, $field);

            $this->properties[$key] = $value;
        }

        return $this;
    }

    private function isLegacyProperty(string $propertie): bool
    {
        return in_array($propertie, $this->legacyProperties);
    }

    /**
     * Get all fields as array<string, null|false>
     * Warning: this method reset all properties values
     */
    private function cloneFields(): static
    {
        $fields = $this->fields;

        array_walk($fields, function ($type, $i) {
            $this->properties[$i] = $type->allowBooleans()
                ? self::DEFAULT_BOOL
                : self::DEFAULT_PARAM;
        });

        return $this;
    }

    /**
     * Get property value, if not exist return null
     */
    private function getter(string $key): mixed
    {
        if ($this->existsProperty($key) === false && Types::$returnNullParams === false) {
            throw new TelegramParamException('Param ' . $key . ' not found');
        }

        $property = $this->properties[$key]
            ?? $this->properties[substr($key, 4)]
            ?? self::DEFAULT_PARAM;

        return $property;
    }

    /**
     * check if value match with field type and set it
     */
    private function fluentSetter(string $key, mixed $value): static
    {
        if ($this->existsProperty($key) === false) {
            throw new TelegramParamException('Param ' . $key . ' not found in ' . $this::class);
        }

        $field = $this->fields[$key];

        $this->checkIfPropertyMatchValues($key, $value, $field);

        $this->properties[$key] = $value;
        return $this;
    }

    /**
     * Return true if the property exists
     */
    private function existsProperty(string $property): bool
    {
        return array_key_exists($property, $this->properties);
    }

    private function checkIfPropertyMatchValues(string $key, mixed $value, FieldType $field): void
    {
        if ($field->match($value) === false) {
            throw new TelegramParamException('Param ' . $key . ' must be ' . $field->explainType());
        }
    }

    protected function getProperties(): array
    {
        $params = [];

        foreach ($this->properties as $key => $value) {

            $value = $this->propertieToScalar($key);

            if (Types::$returnNullParams === false && ($value === self::DEFAULT_PARAM || $value === self::DEFAULT_BOOL)) {
                continue;
            }

            $params[$key] = $value;
        }

        return $params;
    }

    private function propertieToScalar(string $key): mixed
    {
        if (!isset($this->fields[$key]) && Types::$returnNullParams === false) {
            throw new TelegramParamException('Propertie ' . $key . ' not found');
        }
        $type  = $this->fields[$key] ?? FieldType::optional('mixed');
        $value = $this->properties[$key] ?? (
            $type->allowBooleans()
            ? self::DEFAULT_BOOL
            : self::DEFAULT_PARAM
        );

        if (is_array($value)) {
            $value = array_map(function ($val) {
                if ($val instanceof TypesInterface) {
                    return $val->get();
                }
                return $val;
            }, $value);
        }

        if ($value instanceof TypesInterface) {
            $value = $value->get();
        }

        return $value;
    }
}

/**
 * @internal
 */
function _filter_update(array &$up): array
{
    foreach ($up as $key => $value) {
        \is_array($value) && $up[$key] = _filter_update($value);

        if ($value === abstractType::DEFAULT_BOOL || $value === abstractType::DEFAULT_PARAM) {
            unset($up[$key]);
        }
    }

    return $up;
}
