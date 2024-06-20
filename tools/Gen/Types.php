<?php

namespace Tools\Gen;

use Mateodioev\Bots\Telegram\Config\strUtils;

use function in_array;

class Types
{
    use phpDocDescription;
    use fieldGen;

    /**
     * @param array $description Multiline description
     * @param Field[] $fields Properties
     * @param ?string[] $subtypes Child classes
     * @param ?string[] $subtypeOf Parent class
     */
    public function __construct(
        public string $name,
        public string $link,
        public array $description = [],
        public array $fields      = [],
        public ?array $subtypes   = null,
        public ?array $subtypeOf  = null,
    ) {
        $this->fields = array_map(
            fn ($field): Field => new Field(
                $field['name'],
                $field['types'],
                $field['required'],
                $field['description']
            ),
            $this->fields,
        );
    }

    /**
     * Return true if the type has subtypes (child).
     */
    public function hasSubTypes(): bool
    {
        return $this->subtypes !== null;
    }

    /**
     * Return true if the given type is a subtype of this type.
     */
    public function isSubTypeOf(string $type): bool
    {
        return $this->subtypeOf !== null && in_array($type, $this->subtypeOf);
    }

    /**
     * Get collection of phpDoc for properties.
     * Format: `* @property Type $name Description`
     */
    public function docProperties(): array
    {
        $docProperties = [];

        $format = ' * @property %s $%s %s';
        foreach ($this->fields as $field) {
            $docProperties[] = sprintf($format, $field->typeStr(), $field->name, $field->description);
        }

        return $docProperties;
    }

    /**
     * Get collection of phpDoc for methods. Return getters and setters methods
     * Format: `* @method ReturnType methodName()` or `* @method static ReturnType methodName(ParamName $param)`
     */
    public function docMethods(): array
    {
        $docMethods = [];

        // Getters
        $format = ' * @method %s %s()';
        foreach ($this->fields as $field) {
            $docMethods[] = sprintf($format, $field->typeStr(), strUtils::toCamelCase($field->name), $field->typeStr());
        }

        $docMethods[] = ' *';

        // Setters
        $format = ' * @method static %s(%s $%s)';
        foreach ($this->fields as $field) {
            $methodName = 'set' . strUtils::toPascalCase($field->name);
            $docMethods[] = sprintf($format, $methodName, $field->typeStr(), strUtils::toCamelCase($field->name));
        }

        return $docMethods;
    }
}
