<?php 

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

/**
 * Represents a location to which a chat is connected.
 * 
 * @see https://core.telegram.org/bots/api#chatlocation
 */
class ChatLocation extends TypesBase implements TypesInterface
{
  public Location $location;
  public string $address;

  public function __construct(stdClass $up) {
    $this->setLocation(Location::create($up->location))
      ->setAddress($up->address);
  }

  public function setLocation(Location $location): ChatLocation
  {
    $this->location = $location;
    return $this;
  }

  public function setAddress(string $address): ChatLocation
  {
    $this->address = $address;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}