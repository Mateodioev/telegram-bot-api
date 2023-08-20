<?php

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{strUtils, Types as TypeConfig};
use Mateodioev\Bots\Telegram\Exception\TelegramParamException;
use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use Mateodioev\Bots\Telegram\Types\object\gettersSetters;
use stdClass;

use function in_array, str_starts_with, substr, array_walk, is_null, get_object_vars, is_subclass_of;

/**
 * Summary of baseType
 */
abstract class baseType implements TypesInterface
{
    use gettersSetters;

    public function isMany(string $fieldName): bool
    {
        return is_array($this->getField($fieldName));
    }

    public function __call($name, $arguments): mixed
    {
        $fieldName = strUtils::toSnakeCase($name);

        // set new field
        if (str_starts_with($fieldName, 'set')) {
            $fieldName = substr($fieldName, 4);
            return $this->fluentSetter($fieldName, $arguments[0]);
        }

        // get field name
        return $this->getter($fieldName);
    }

    /**
     * Clone fields key into array
     * Warning: this method reset all properties values
     */
    private function cloneFields(): static
    {
        $fields = $this->fields();
        array_walk($fields, function ($_, $i) {
            $this->properties[$i] = in_array('boolean', $this->getFieldType($i))
                ? self::DEFAULT_BOOL
                : self::DEFAULT_PARAM;
        });

        return $this;
    }

    public function getReduced(): array
    {
        $up = $this->get();
        return _filter_update($up);
    }

    public function __construct(?array $args = null)
    {
        $this->cloneFields();

        if ($args === null) return;

        // create from construct params
        // $obj = new Obj(param1: 1, param2: 'user');
        $this->properties = self::createFromArray($args)->properties();
    }

    public static function create(?stdClass $up)
    {
        if (is_null($up)) return self::DEFAULT_PARAM;

        return self::createFromArray(get_object_vars($up));
    }

    public static function createFromType(TypesInterface $up)
    {
        // prevent set null params 
        TypeConfig::setReturnNullParams(false);
        $obj = self::createFromArray($up->get());
        TypeConfig::setReturnNullParams(true);
        return $obj;
    }

    public static function createFromArray(?array $up)
    {
        if (is_null($up)) return self::DEFAULT_PARAM;

        $instance = new static;

        foreach ($up as $key => $value) {
            // only for scalar, check
            $type = $instance->getFieldType($key);

            if (empty($type)) {
                if (TypeConfig::$throwOnFail) {
                    throw new TelegramParamException('Unknow property ' . $key . ' in type ' . $instance::class);
                } else {
                    continue; // Ignore invalid property
                }
            }

            if (is_subclass_of($type[0], TypesInterface::class)) {
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

            $methodName = 'set_' . $key;
            $instance->{$methodName}($value); // use __call
        }

        return $instance;
    }

    /**
     * @return static[]|null
     */
    public static function bulkCreate(?array $up): ?array
    {
        if (is_null($up)) return self::DEFAULT_PARAM;

        return array_map(function ($update) {
            if ($update instanceof stdClass) {
                return self::create($update);
            } elseif (is_array($update) || is_null($update)) {
                return self::createFromArray($update);
            } elseif ($update instanceof TypesInterface) {
                return self::createFromType($update);
            } else {
                throw new TelegramParamException('Invalid update');
            }
        }, $up);
    }

    public function __debugInfo()
    {
        return $this->properties;
    }
}

function _filter_update(array &$up): array
{
    foreach ($up as $key => $value) {
        \is_array($value) && $up[$key] = _filter_update($value);

        if ($value === baseType::DEFAULT_BOOL || $value === baseType::DEFAULT_PARAM) {
            unset($up[$key]);
        }
    }

    return $up;
}
