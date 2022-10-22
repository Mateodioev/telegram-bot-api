<?php 

namespace Mateodioev\Bots\Telegram\Interfaces;

use stdClass;

interface TypesInterface
{
  public function get();

  /**
   * create new instance
   */
  public static function create(?stdClass $up);

  /**
   * Create multiple instances from array
   */
  public static function bulkCreate(?array $up);
}
