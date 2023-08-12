<?php

namespace Mateodioev\Bots\Telegram\Interfaces;

use stdClass;

interface TypesInterface
{
  /**
   * Get all properties
   * @return array
   */
  public function get();

  /**
   * Same as static::get() but not return null or false value
   */
  public function getReduced(): array;

  public function __call($name, $arguments);

  /**
   * create new instance
   */
  public static function create(?stdClass $up);

  /**
   * Create new instance from existent object
   * @return ?static
   */
  public static function createFromType(TypesInterface $up);

  /**
   * create new instance from array
   * @return ?static
   */
  public static function createFromArray(?array $up);

  /**
   * Create multiple instances from array
   */
  public static function bulkCreate(?array $up): ?array;
}
