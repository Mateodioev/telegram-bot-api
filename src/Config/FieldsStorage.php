<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Config;

final class FieldsStorage
{
    private static ?FieldsStorage $instance = null;

    public static function instance(): FieldsStorage
    {
        if (self::$instance === null) {
            self::$instance = new FieldsStorage();
        }
        return self::$instance;
    }

    /**
     * @var array<class-string, array<string, FieldType>>
     */
    private array $fieldsClass = [];

    /**
     * @param class-string $class
     * @param array<string, FieldType> $fields
     */
    public function add(string $class, array $fields): static
    {
        $this->fieldsClass[$class] = $fields;
        return $this;
    }

    /**
     * @param class-string $class
     */
    public function exists(string $class): bool
    {
        return isset($this->fieldsClass[$class]);
    }

    /**
     * @param class-string $class
     * @return array<string, FieldType>
     */
    public function get(string $class): array
    {
        return $this->fieldsClass[$class];
    }
}
