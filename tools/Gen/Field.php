<?php

namespace Tools\Gen;

use Mateodioev\Bots\Telegram\Config\FieldType;

use function str_starts_with;

/**
 * Property of a type.
 */
class Field
{
    use fieldGen;

    /**
     * @param string $name Name of the property
     * @param FieldType[] $types Types of this property
     * @param bool $required True if the property is required
     * @param string $description Description of the property
     */
    public function __construct(
        public string $name,
        public array $types        = [],
        public bool $required      = false,
        public string $description = '',
    ) {
        $this->types = self::parseTypes($types);
    }

    /**
     * @param string[] $types
     * @return FieldType[]
     */
    public static function parseTypes(array $types): array
    {
        $parsedTypes = [];

        foreach ($types as $type) {
            $allowArrays = false;

            if (str_starts_with($type, 'Array of ')) {
                $type        = str_replace('Array of ', '', $type);
                $allowArrays = true;
            }
            $parsedTypes[] = new FieldType(self::genType($type), $allowArrays);
        }
        return $parsedTypes;
    }

    /**
     * Generate type string for phpDoc.
     */
    public function typeStr()
    {
        $types = [];
        foreach ($this->types as $type) {
            $typeStr = $type->getType();
            if ($type->isScalar() === false) {
                $typeStr = str_replace('Mateodioev\Bots\Telegram\Types\\', '', $typeStr);
            } else {
                $convert = ['integer' => 'int', 'boolean' => 'bool'];
                $typeStr = $convert[$typeStr] ?? $typeStr;
            }
            if ($type->allowArrays()) {
                $typeStr = $typeStr . '[]'; // e.g. Type[]
            }
            $types[] = $typeStr;
        }

        $type = join('|', $types);
        if ($this->required === false) {
            return $type . '|null';
        }

        return $type;
    }
}
