<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Config;

use Mateodioev\Bots\Telegram\Exception\TelegramParamException;
use function in_array, is_array;

/**
 * @internal Used to define the type of field in a class
 */
final class FieldType
{
    private bool $isScalar;
    private bool $isMixed = false;

    private array $cachedSubFields = [];
    private ?\Closure $matcher = null;

    public function __construct(
        private readonly string $type,
        private readonly bool   $allowArrays = false,
        private readonly bool   $allowNull = false,
        private readonly array  $subTypes = []
    ) {
        if ($type === 'mixed')
            $this->isMixed = true;

        if (!empty($this->subTypes))
            $this->getSubFields();

        $this->isScalar = in_array($type, ['integer', 'double', 'string', 'boolean']);

        if ($this->isScalar === false && class_exists($this->type) === false)
            throw new TelegramParamException('Invalid type ' . $this->type);
    }

    public function match(mixed $value): bool
    {
        foreach ($this->cachedSubFields as $subField) {
            if ($subField->match($subField) === false)
                return false;
        }

        if ($this->isMixed) // mixed type match with all values
            return true;

        if ($this->allowNull && $value === null)
            return true;

        if ($this->allowArrays) {
            if (is_array($value)) {
                return $this->matchArray($value);
            }
            return false;
        }

        return $this->getMatcher()($value);
    }

    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Return true if the field support arrays
     */
    public function allowArrays(): bool
    {
        return $this->allowArrays;
    }

    /**
     * Return null if the is not required or support null values
     */
    public function allowNull(): bool
    {
        return $this->allowNull;
    }

    /**
     * Create new instance for subFields
     */
    private function getSubFields(): void
    {
        if (empty($this->cachedSubFields)) {
            $this->cachedSubFields = array_map(function ($subType): FieldType {
                return new FieldType($subType, $this->allowArrays, $this->allowNull);
            }, $this->subTypes);
        }
    }

    /**
     * Match primitive types.
     */
    private function matchScalar(mixed $value): bool
    {
        return \gettype($value) === $this->type;
    }

    /**
     * Match objects.
     */
    private function matchObjects(mixed $value): bool
    {
        return \is_a($value, $this->type);
    }

    /**
     * Match array values.
     * Return true if all values match with the type
     */
    private function matchArray(array $arr): bool
    {
        if (empty($arr))
            return true;

        $matcher = $this->getMatcher();

        $len = \count($arr);
        for ($i = 0; $i < $len; $i++) {
            if (!$matcher($arr[$i]))
                return false;
        }

        return true;
    }

    private function getMatcher(): \Closure
    {
        if ($this->matcher === null) {
            $this->matcher = $this->isScalar
                ? $this->matchScalar(...)
                : $this->matchObjects(...);
        }

        return $this->matcher;
    }
}
