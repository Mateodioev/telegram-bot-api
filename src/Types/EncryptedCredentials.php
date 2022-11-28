<?php

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

/**
 * Describes data required for decrypting and authenticating EncryptedPassportElement.
 * See the Telegram Passport Documentation for a complete description of the data decryption and authentication processes.
 * 
 * @see https://core.telegram.org/bots/api#encryptedcredentials
 */
class EncryptedCredentials extends TypesBase implements TypesInterface
{
  public string $data, $hash, $secret;

  public function __construct(stdClass $up) {
    $this->setData($up->data)
      ->setHash($up->hash)
      ->setSecret($up->secret);
  }

  public function setData(string $data): EncryptedCredentials
  {
    $this->data = $data;
    return $this;
  }

  public function setHash(string $hash): EncryptedCredentials
  {
    $this->hash = $hash;
    return $this;
  }

  public function setSecret(string $secret): EncryptedCredentials
  {
    $this->secret = $secret;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}
