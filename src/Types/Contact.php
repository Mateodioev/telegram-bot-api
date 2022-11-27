<?php 

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

/**
 * This object represents a phone contact.
 * 
 * @see https://core.telegram.org/bots/api#contact
 */
class Contact extends TypesBase implements TypesInterface
{
  public string $phone_number;
  public string $first_name;
  public ?string $last_name;
  public ?int $user_id;
  public ?string $vcard;

  public function __construct(stdClass $up) {
    $this->setPhoneNumber($up->phone_number)
      ->setFirstName($up->first_name)
      ->setLastName($up->last_name ?? self::DEFAULT_PARAM)
      ->setUserId($up->user_id ?? self::DEFAULT_PARAM)
      ->setVcard($up->vcard ?? self::DEFAULT_PARAM);
  }

  public function setPhoneNumber(string $phoneNumber): Contact
  {
    $this->phone_number = $phoneNumber;
    return $this;
  }
  
  public function setFirstName(string $firstName): Contact
  {
    $this->first_name = $firstName;
    return $this;
  }
  
  public function setLastName(?string $lastName): Contact
  {
    $this->last_name = $lastName;
    return $this;
  }
  
  public function setUserId(?int $userId): Contact
  {
    $this->user_id = $userId;
    return $this;
  }
  
  public function setVcard(?string $vcard): Contact
  {
    $this->vcard = $vcard;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}
