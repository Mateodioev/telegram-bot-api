<?php

namespace Tools\Gen;

use function array_pop;
use function in_array;
use function max;
use function sprintf;
use function str_repeat;
use function str_replace;
use function strlen;

/**
 * Convert a type into a string.
 */
class TypeStr
{
    public const TAB_SIZE = 4; // spaces

    /**
     * Max length of the fields
     */
    private int $maxFieldLength = -1;

    /**
     * Cache the length of the fields
     */
    private array $cacheLengths = [];

    public function __construct(
        private Types $type
    ) {
    }

    public function classHeader(): string
    {
        $header = <<<PHP
            <?php
            
            declare(strict_types=1);

            namespace Mateodioev\Bots\Telegram\Types;{$this->requireFieldType()}

            %s
            class {$this->type->name} extends {$this->parentClass()}
            {
                protected function boot(): void
                {
                    if (static::\$fields !== null) {
                        // Already booted
                        return;
                    }
                    static::\$fields = [
            %s
                    ];
                }%s
            }

            PHP;

        return $header;
    }

    /**
     * Get the parent class name to extends.
     */
    private function parentClass(): string
    {
        return $this->type->subtypeOf !== null
            ? $this->type->subtypeOf[0]
            : 'abstractType';
    }

    /**
     * Import FieldType class if the type has fields.
     */
    private function requireFieldType(): string
    {
        return !empty($this->type->fields)
            ? PHP_EOL . PHP_EOL . 'use Mateodioev\Bots\Telegram\Config\FieldType;'
            : '';
    }

    private function generateFields(): string
    {
        $fields = [];

        foreach ($this->type->fields as $field) {
            $fields[] = $this->tab(3) . $this->generateField($field);
        }

        return \join(PHP_EOL, $fields);
    }

    private function generateField(Field $field): string
    {
        $spaces = str_repeat(' ', $this->maxFieldLength - $this->fieldLength($field->name));

        return '\'' . $field->name . '\'' . $spaces . ' => ' . $this->generateFieldTypeConstructor($field) . ',';
    }

    private function generateFieldTypeConstructor(Field $fieldType): string
    {
        $optional = !$fieldType->required ? 'true' : 'false';
        $multiple = false;

        $first = array_pop($fieldType->types);

        $subtypes = [];
        foreach ($fieldType->types as $type) {
            $subtypes[] = "'" . $type->getType() . "'";
            if ($type->allowArrays()) {
                $multiple = true;
            }
        }

        if ($first->allowArrays()) {
            $multiple = true;
        }

        $multiple = $multiple ? 'true' : 'false';

        if ($first->isScalar() === false) {
            $firstType = str_replace('Mateodioev\Bots\Telegram\Types\\', '', $first->getType()) . '::class';
        } else {
            $firstType = '\'' . $first->getType() . '\'';
        }

        if (in_array('\'Mateodioev\Bots\Telegram\Types\InputFile\'', [$firstType, ...$subtypes])) {
            return 'FieldType::mixed()';
        }

        if (empty($subtypes)) {
            if ($multiple === 'false' && $optional === 'false') {
                return 'FieldType::single(' . $firstType . ')';
            }

            if ($multiple === 'true' && $optional === 'false') {
                return 'FieldType::multiple(' . $firstType . ')';
            }

            if ($multiple === 'false' && $optional === 'true') {
                return 'FieldType::optional(' . $firstType . ')';
            }
        }

        return "new FieldType(" . $firstType . ", allowArrays: " . $multiple . ", allowNull: " . $optional . ", subTypes: [" . join(', ', $subtypes) . "])";
    }

    public function __toString()
    {
        return sprintf(
            $this->classHeader(),
            $this->generatePhpDoc(),
            $this->generateFields(),
            $this->generateChildMethod(),
        );
    }

    private function generateChildMethod(): string
    {
        if (!$this->type->hasSubTypes()) {
            return '';
        }

        $format = <<<PHP
            
        
                public static function childs(): array
                {
                    return [
            %s
                    ];
                }
            PHP;

        $childArray = [];
        foreach ($this->type->subtypes as $subType) {
            $childArray[] = $this->tab(3) . $subType . '::class,';
        }
        return sprintf($format, \join(PHP_EOL, $childArray));
    }

    /**
     * Generate the phpdoc for the class (type).
     */
    private function generatePhpDoc(): string
    {
        $this->getMaxFieldLength();

        $docString = $this->phpDocString();
        $docString = empty($docString) ? '' : PHP_EOL . $docString;

        return '/**'
            . PHP_EOL . $this->phpDocDescription()
            . $docString
            . PHP_EOL . $this->seeTagDescription()
            . PHP_EOL . ' */';
    }

    private function phpDocDescription(): string
    {
        return \join(PHP_EOL, $this->type->docDescription());
    }

    private function seeTagDescription(): string
    {
        return ' *' . PHP_EOL . ' * @see ' . $this->type->link;
    }

    private function phpDocString(): string
    {
        $properties = $this->phpDocProperties();
        if (empty($properties)) {
            return '';
        }

        return ' *' . PHP_EOL . $properties . PHP_EOL . ' *' . PHP_EOL . $this->phpDocMethods();
    }

    private function phpDocProperties(): string
    {
        return \join(PHP_EOL, $this->type->docProperties());
    }

    private function phpDocMethods(): string
    {
        return \join(PHP_EOL, $this->type->docMethods());
    }

    private function getMaxFieldLength(): int
    {
        foreach ($this->type->fields as $field) {
            $this->cacheLengths[$field->name] = $fieldLen = strlen($field->name);
            $this->maxFieldLength = max($this->maxFieldLength, $fieldLen);
        }

        return $this->maxFieldLength;
    }

    /**
     * Get length of the field. You can also use strlen() directly.
     */
    private function fieldLength(string $field): int
    {
        return $this->cacheLengths[$field] ?? 0;
    }

    /**
     * Convert tabs into spaces.
     */
    public static function tab(int $cant = 1): string
    {
        return str_repeat(' ', self::TAB_SIZE * $cant);
    }
}
