<?php 

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

// TODO: terminado

/**
 * This object represents a point on the map.
 * 
 * @see https://core.telegram.org/bots/api#location
 */
class Location extends TypesBase implements TypesInterface
{
  public float $longitude;
  public float $latitude;
  public float|int|null $horizontal_accuracy;
  public ?int $live_period;
  public ?int $heading;
  public ?int $proximity_alert_radius;

  public function __construct(stdClass $up) {
    $this->setLongitude($up->longitude ?? 0.0)
      ->setLatitude($up->latitude ?? 0.0)
      ->setHorizontalAccuracy($up->horizontal_accuracy ?? self::DEFAULT_PARAM)
      ->setLivePeriod($up->live_period ?? self::DEFAULT_PARAM)
      ->setHeading($up->heading ?? self::DEFAULT_PARAM)
      ->setProximityAlertRadious($up->proximity_alert_radius ?? self::DEFAULT_PARAM);
  }

  public function setLongitude(float $longitude): Location
  {
    $this->longitude = $longitude;
    return $this;
  }

  public function setLatitude(float $latitude): Location
  {
    $this->latitude = $latitude;
    return $this;
  }

  public function setHorizontalAccuracy($horizontal_accuracy): Location
  {
    $this->horizontal_accuracy = $horizontal_accuracy;
    return $this;
  }

  public function setLivePeriod(?int $livePeriod): Location
  {
    $this->live_period = $livePeriod;
    return $this;
  }

  public function setHeading(?int $heading): Location
  {
    $this->heading = $heading;
    return $this;
  }

  public function setProximityAlertRadious(?int $proximityAlertRadious): Location
  {
    $this->proximity_alert_radius = $proximityAlertRadious;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}
