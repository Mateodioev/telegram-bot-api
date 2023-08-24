<?php

namespace Tools\Gen;

use Mateodioev\Bots\Telegram\Config\strUtils;

use function in_array;

class Types
{
    use phpDocDescription;
    use fieldGen;

    /**
     * @param Field[] $fields
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
            fn ($field) => new Field(
                $field['name'],
                $field['types'],
                $field['required'],
                $field['description']
            ),
            $this->fields,
        );
    }

    public function hasSubTypes(): bool
    {
        return $this->subtypes !== null;
    }

    public function isSubTypeOf(string $type): bool
    {
        return $this->subtypeOf !== null && in_array($type, $this->subtypeOf);
    }

    public function docProperties(): array
    {
        $docProperties = [];

        $format = ' * @property %s $%s %s';
        foreach ($this->fields as $field) {
            $docProperties[] = sprintf($format, $field->typeStr(), $field->name, $field->description);
        }

        return $docProperties;
    }

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
