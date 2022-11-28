<?php

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

/**
 * This object represents a file uploaded to Telegram Passport.
 * Currently all Telegram Passport files are in JPEG format when decrypted and don't exceed 10MB.
 * 
 * @see https://core.telegram.org/bots/api#passportfile
 */
class PassportFile extends TypesBase implements TypesInterface
{
  public string $file_id;
  public string $file_unique_id;
  public int $file_size;
  public int $file_date;

  public function __construct(stdClass $up) {
    $this->setFileId($up->file_id)
      ->setFileUniqueId($up->file_unique_id)
      ->setFileSize($up->file_size)
      ->setFileDate($up->file_date);
  }

  public function setFileId(string $fileId): PassportFile
  {
    $this->file_id = $fileId;
    return $this;
  }

  public function setFileUniqueId(string $fileUniqueId): PassportFile
  {
    $this->file_unique_id = $fileUniqueId;
    return $this;
  }

  public function setFileSize(int $fileSize): PassportFile
  {
    $this->file_size = $fileSize;
    return $this;
  }

  public function setFileDate(int $fileDate): PassportFile
  {
    $this->file_date = $fileDate;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}
