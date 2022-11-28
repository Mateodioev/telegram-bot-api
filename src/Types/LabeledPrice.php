<?php

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

/**
 * This object represents a portion of the price for goods or services.
 * 
 * @see https://core.telegram.org/bots/api#labeledprice
 */
class LabeledPrice extends TypesBase implements TypesInterface
{
  public string $label;
  public int $amount;

  public function __construct(stdClass $up) {
    $this->setLabel($up->label)
      ->setAmount($up->amount);
  }

  public function setLabel(string $label): LabeledPrice
  {
    $this->label = $label;
    return $this;
  }
  
  public function setAmount(int $amount): LabeledPrice
  {
    $this->amount = $amount;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}
