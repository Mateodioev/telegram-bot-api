<?php

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

// TODO: terminado

/**
 * This object represents a shipping address.
 * 
 * @see https://core.telegram.org/bots/api#shippingaddress
 */
class ShippingAddress extends TypesBase implements TypesInterface
{
  public string $country_code;
  public string $state;
  public string $city;
  public string $street_line1;
  public string $street_line2;
  public string $post_code;

  public function __construct(stdClass $up) {
    $this->setCountryCode($up->country_code)
      ->setState($up->state)
      ->setCity($up->city)
      ->setStreetLine1($up->street_line1)
      ->setStreetLine2($up->street_line2)
      ->setPostCode($up->post_code);
  }
  public function setCountryCode(string $countryCode): ShippingAddress
  {
    $this->country_code = $countryCode;
    return $this;
  }

  public function setState(string $state): ShippingAddress
  {
    $this->state = $state;
    return $this;
  }

  public function setCity(string $city): ShippingAddress
  {
    $this->city = $city;
    return $this;
  }
  
  public function setStreetLine1(string $streetLine1): ShippingAddress
  {
    $this->street_line1 = $streetLine1;
    return $this;
  }

  public function setStreetLine2(string $streetLine2): ShippingAddress
  {
    $this->street_line2 = $streetLine2;
    return $this;
  }

  public function setPostCode(string $postCode): ShippingAddress
  {
    $this->post_code = $postCode;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}
