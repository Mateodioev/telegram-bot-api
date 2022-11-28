<?php

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

/**
 * Describes Telegram Passport data shared with the bot by the user.
 * 
 * @see https://core.telegram.org/bots/api#passportdata
 */
class PassportData extends TypesBase implements TypesInterface
{
  public array $data;
  public array $credentials;

  public function __construct(stdClass $up) {
    $this->setData(EncryptedPassportElement::bulkCreate($up->data))
      ->setCredentials(EncryptedCredentials::bulkCreate($up->credentials));
  }

  public function setData(array $data): PassportData
  {
    $this->data = $data;
    return $this;
  }

  public function setCredentials(array $credentials): PassportData
  {
    $this->credentials = $credentials;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}
