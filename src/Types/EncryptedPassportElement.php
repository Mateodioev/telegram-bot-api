<?php

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

/**
 * Describes documents or other Telegram Passport elements shared with the bot by the user.
 * 
 * @see https://core.telegram.org/bots/api#encryptedpassportelement
 */
class EncryptedPassportElement extends TypesBase implements TypesInterface
{
  public string $type;
  public ?string $data;
  public ?string $phone_number;
  public ?string $email;
  public ?array $files;
  public ?PassportFile $front_side;
  public ?PassportFile $reverse_side;
  public ?PassportFile $selfie;
  public ?array $translation;
  public string $hash;

  public function __construct(stdClass $up) {
    $this->setType($up->type)
      ->setData($up->data ?? self::DEFAULT_PARAM)
      ->setPhoneNumber($up->phone_number ?? self::DEFAULT_PARAM)
      ->setEmail($up->email ?? self::DEFAULT_PARAM)
      ->setFiles(PassportFile::bulkCreate($up->files ?? self::DEFAULT_PARAM))
      ->setFrontSide(PassportFile::create($up->front_side ?? self::DEFAULT_PARAM))
      ->setReverseSide(PassportFile::create($up->reverse_side ?? self::DEFAULT_PARAM))
      ->setSelfie(PassportFile::create($up->selfie ?? self::DEFAULT_PARAM))
      ->setTranslation(PassportFile::bulkCreate($up->translation ?? self::DEFAULT_PARAM))
      ->setHash($up->hash);
  }

  public function setType(string $type): EncryptedPassportElement
  {
    $this->type = $type;
    return $this;
  }

  public function setData(?string $data): EncryptedPassportElement
  {
    $this->data = $data;
    return $this;
  }

  public function setPhoneNumber(?string $phoneNumber): EncryptedPassportElement
  {
    $this->phone_number = $phoneNumber;
    return $this;
  }

  public function setEmail(?string $email): EncryptedPassportElement
  {
    $this->email = $email;
    return $this;
  }

  public function setFiles(?array $files): EncryptedPassportElement
  {
    $this->files = $files;
    return $this;
  }

  public function setFrontSide(?PassportFile $frontSide): EncryptedPassportElement
  {
    $this->front_side = $frontSide;
    return $this;
  }

  public function setReverseSide(?PassportFile $reverseSide): EncryptedPassportElement
  {
    $this->reverse_side = $reverseSide;
    return $this;
  }

  public function setSelfie(?PassportFile $selfie): EncryptedPassportElement
  {
    $this->selfie = $selfie;
    return $this;
  }

  public function setTranslation(?array $translation): EncryptedPassportElement
  {
    $this->translation = $translation;
    return $this;
  }

  public function setHash(string $hash): EncryptedPassportElement
  {
    $this->hash = $hash;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}
