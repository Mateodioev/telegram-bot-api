<?php 

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

use function json_encode;

/**
 * This object describes the position on faces where a mask should be placed by default.
 * @see https://core.telegram.org/bots/api#maskposition
 */
class MaskPosition extends TypesBase implements TypesInterface
{
  public string $point;
  public float $scale;
  public float $x;
  public float $y;

  public function __construct(stdClass $up) {
    $this->setPoint($up->point)
      ->setScale($up->scale)
      ->setXshift($up->x_shift)
      ->setYshift($up->y_shift);
  }

  /**
   * @param string $point `forehead`, `eyes`, `mouth`, or `chin`.
   */
  public function setPoint(string $point): MaskPosition
  {
    $this->point = $point;
    return $this;
  }

  public function setXshift(float $x): MaskPosition
  {
    $this->x = $x;
    return $this;
  }

  public function setYshift(float $y): MaskPosition
  {
    $this->y = $y;
    return $this;
  }

  public function setScale(float $scale): MaskPosition
  {
    $this->scale = $scale;
    return $this;
  }

  public function get()
  {
    try {
      return json_encode($this->getProperties($this));
    } catch (\Throwable $_) {
      return null;
    }
  }
}
