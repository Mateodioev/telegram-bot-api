<?php

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

/**
 * This object represents the content of a service message, sent whenever a user in the chat triggers a proximity alert set by another user.
 * 
 * @see https://core.telegram.org/bots/api#proximityalerttriggered
 */
class ProximityAlertTriggered extends TypesBase implements TypesInterface
{
  public User $traveler;
  public User $watcher;
  public int $distance;

  public function __construct(stdClass $up) {
    $this->setTraveler(User::create($up->traveler))
      ->setWatcher(User::create($up->watcher))
      ->setDistance($up->distance);
  }

  public function setTraveler(User $traveler): ProximityAlertTriggered
  {
    $this->traveler = $traveler;
    return $this;
  }

  public function setWatcher(User $watcher): ProximityAlertTriggered
  {
    $this->watcher = $watcher;
    return $this;
  }

  public function setDistance(int $distance): ProximityAlertTriggered
  {
    $this->distance = $distance;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}
