<?php

namespace Mateodioev\Bots\Telegram\Interfaces;

interface TypesInterface
{
    /**
     * Get all properties
     */
    public function get(): array;

    /**
     * Get only properties that not null or false
     */
    public function getReduced(): array;

    public function toJson(int $flags = 0): string;
    public function toString(): string;

    /**
     * Create new instance
     */
    public static function create(?array $update): ?static;

    /**
     * Create new instance, but initialize some fields with default values
     */
    public static function default(): static;

    public static function bulkCreate(?array $up): ?array;

    /**
     * If the object has sub-classes, returns an array of them. Otherwise, returns an empty array.
     * @return TypesInterface[]
     */
    public static function childs(): array;

    /**
     * If the object has sub-classes, returns the name of the sub-class that should be instantiated. Otherwise return the class name.
     */
    public static function selectChild(array $update): string;
}
