<?php

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

/**
 * This object contains basic information about an invoice.
 * 
 * @see https://core.telegram.org/bots/api#invoice
 */
class Invoice extends TypesBase implements TypesInterface
{
  public string $title;
  public string $description;
  public string $start_parameter;
  public string $currency;
  public int $total_amount;

  public function __construct(stdClass $up) {
    $this->setTitle($up->title)
      ->setDescription($up->description)
      ->setStartParameter($up->start_parameter)
      ->setCurrency($up->currency)
      ->setTotalAmount($up->total_amount);
  }

  public function setTitle(string $title): Invoice
  {
    $this->title = $title;
    return $this;
  }
  
  public function setDescription(string $description): Invoice
  {
    $this->description = $description;
    return $this;
  }
  
  public function setStartParameter(string $startParameter): Invoice
  {
    $this->start_parameter = $startParameter;
    return $this;
  }
  
  public function setCurrency(string $currency): Invoice
  {
    $this->currency = $currency;
    return $this;
  }

  public function setTotalAmount(int $totalAmount): Invoice
  {
    $this->total_amount = $totalAmount;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}
