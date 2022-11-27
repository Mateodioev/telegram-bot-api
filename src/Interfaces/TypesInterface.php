<?php 

namespace Mateodioev\Bots\Telegram\Interfaces;

use stdClass;

interface TypesInterface
{
  public function get();

  public function __call($name, $arguments);

  /**
   * create new instance
   */
  public static function create(?stdClass $up);

  /**
   * Create multiple instances from array
   */
  public static function bulkCreate(?array $up);
}
