<?php

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

// TODO: terminado

/**
 * This object represents information about an order.
 * 
 * @see https://core.telegram.org/bots/api#orderinfo
 */
class OrderInfo extends TypesBase implements TypesInterface
{
  public ?string $name;
  public ?string $phoneNumber;
  public ?string $email;
  public ?ShippingAddress $shippingAddress;

  public function __construct(stdClass $up) {
    $this->setName($up->name ?? self::DEFAULT_PARAM)
      ->setPhoneNumber($up->phone_number ?? self::DEFAULT_PARAM)
      ->setEmail($up->email ?? self::DEFAULT_PARAM)
      ->setShippingAddress(ShippingAddress::create($up->shipping_address ?? self::DEFAULT_PARAM));
  }
  public function setName(?string $name): OrderInfo
  {
    $this->name = $name;
    return $this;
  }
  
  public function setPhoneNumber(?string $phoneNumber): OrderInfo
  {
    $this->phoneNumber = $phoneNumber;
    return $this;
  }


  public function setEmail(?string $email): OrderInfo
  {
    $this->email = $email;
    return $this;
  }

  public function setShippingAddress(?ShippingAddress $shippingAddress): OrderInfo
  {
    $this->shippingAddress = $shippingAddress;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}
