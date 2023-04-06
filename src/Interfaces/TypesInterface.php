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

  public function __call($name, $arguments);

  /**
   * create new instance
   */
  public static function create(?stdClass $up);

  /**
   * Create new instance from existent object
   */
  public static function createFromType(TypesInterface $up);

  /**
   * create new instance from array
   */
  public static function createFromArray(?array $up);

  /**
   * Create multiple instances from array
   */
  public static function bulkCreate(?array $up): ?array;
}
