<?php

namespace Tools\Gen;

/**
 * Convert a type into a string.
 */
class TypeStr
{
    public const TAB_SIZE = 4; // spaces

    private int $maxFieldLength = -1;
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
                    \$this->fields = [
            %s
                    ];
                }
            }

            PHP;

        return $header;
    }

    private function parentClass(): string
    {
        return $this->type->subtypeOf !== null
            ? $this->type->subtypeOf[0]
            : 'abstractType';
    }

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

        return join(PHP_EOL, $fields);
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
            $this->generateFields()
        );
    }

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

    private function phpDocDescription()
    {
        return join(PHP_EOL, $this->type->docDescription());
    }

    private function seeTagDescription()
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
        return join(PHP_EOL, $this->type->docProperties());
    }

    private function phpDocMethods(): string
    {
        return join(PHP_EOL, $this->type->docMethods());
    }

    private function getMaxFieldLength(): int
    {
        foreach ($this->type->fields as $field) {
            $this->cacheLengths[$field->name] = strlen($field->name);
            $this->maxFieldLength             = max($this->maxFieldLength, $this->cacheLengths[$field->name]);
        }

        return $this->maxFieldLength;
    }

    private function fieldLength(string $field): int
    {
        return $this->cacheLengths[$field] ?? 0;
    }

    public static function tab(int $cant = 1): string
    {
        return str_repeat(' ', self::TAB_SIZE * $cant);
    }
}
