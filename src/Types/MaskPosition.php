<?php 

namespace Mateodioev\Bots\Telegram\Types;

use function json_encode;

class MaskPosition implements TypesInterface
{
  protected string $point;
  protected float $scale;
  protected float $x;
  protected float $y;

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
      return json_encode([
        'point'   => $this->point,
        'scale'   => $this->scale,
        'x_shift' => $this->x,
        'y_shift' => $this->y
      ]);
    } catch (\Throwable $_) {
      return null;
    }
  }
}
