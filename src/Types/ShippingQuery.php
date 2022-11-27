<?php

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

/**
 * This object contains information about an incoming shipping query.
 * 
 * @see https://core.telegram.org/bots/api#shippingquery
 */
class ShippingQuery extends TypesBase implements TypesInterface
{
  public string $id;
  public User $from;
  public string $invoice_payload;
  public ShippingAddress $shipping_address;

  public function __construct(stdClass $up) {
    $this->setId($up->id)
      ->setFrom(User::create($up->from))
      ->setInvoicePayload($up->invoice_payload)
      ->setShippingAddress(ShippingAddress::create($up->shipping_address));
  }

  public function setId(string $id): ShippingQuery
  {
    $this->id = $id;
    return $this;
  }
  
  public function setFrom(User $from): ShippingQuery
  {
    $this->from = $from;
    return $this;
  }
  
  public function setInvoicePayload(string $invoicePayload): ShippingQuery
  {
    $this->invoice_payload = $invoicePayload;
    return $this;
  }
  
  public function setShippingAddress(ShippingAddress $shippingAddress): ShippingQuery
  {
    $this->shipping_address = $shippingAddress;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}
