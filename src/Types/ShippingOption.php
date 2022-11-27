<?php

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

/**
 * This object represents one shipping option.
 * 
 * @see https://core.telegram.org/bots/api#shippingoption
 */
class ShippingOption extends TypesBase implements TypesInterface
{
  public string $id;
  public string $title;
  public array  $prices;

  public function __construct(stdClass $up) {
    $this->setId($up->id)
      ->setTitle($up->title)
      ->setPrices(LabeledPrice::bulkCreate($up->prices));
  }

  public function setId(string $id): ShippingOption
  {
    $this->id = $id;
    return $this;
  }
  
  public function setTitle(string $title): ShippingOption
  {
    $this->title = $title;
    return $this;
  }
  
  public function setPrices(array $prices): ShippingOption
  {
    $this->prices = $prices;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}
