<?php

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

/**
 * This object represents a venue.
 * 
 * @see https://core.telegram.org/bots/api#venue
 */
class Venue extends TypesBase implements TypesInterface
{
  public Location $location;
  public string  $title;
  public string  $address;
  public ?string $foursquare_id;
  public ?string $foursquare_type;
  public ?string $google_place_id;
  public ?string $google_place_type;

  public function __construct(stdClass $up) {
    $this->setLocation(Location::create($up->location))
      ->setTitle($up->title)
      ->setAddress($up->address)
      ->setFoursquareId($up->foursquare_id ?? self::DEFAULT_PARAM)
      ->setFoursquareType($up->foursquare_type ?? self::DEFAULT_PARAM)
      ->setGooglePlaceId($up->google_place_id ?? self::DEFAULT_PARAM)
      ->setGooglePlaceType($up->google_place_type ?? self::DEFAULT_PARAM);
  }

  public function setLocation(Location $location): Venue
  {
    $this->location = $location;
    return $this;
  }

  public function setTitle(string $title): Venue
  {
    $this->title = $title;
    return $this;
  }
  
  public function setAddress(string $address): Venue
  {
    $this->address = $address;
    return $this;
  }

  public function setFoursquareId(?string $foursquareId): Venue
  {
    $this->foursquare_id = $foursquareId;
    return $this;
  }

  public function setFoursquareType(?string $foursquareType): Venue
  {
    $this->foursquare_type = $foursquareType;
    return $this;
  }

  public function setGooglePlaceId(?string $googlePlaceId): Venue
  {
    $this->google_place_id = $googlePlaceId;
    return $this;
  }

  public function setGooglePlaceType(?string $googlePlaceType): Venue
  {
    $this->google_place_type = $googlePlaceType;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}
