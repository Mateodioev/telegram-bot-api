<?php 

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

/**
 * This object represents a voice note.
 * 
 * @see https://core.telegram.org/bots/api#voice
 */
class Voice extends TypesBase implements TypesInterface
{
  public string $file_id;
  public string $file_unique_id;
  public int $duration;
  public ?string $mime_type;
  public ?int $file_size;

  public function __construct(stdClass $up) {
    $this->setFileId($up->file_id)
      ->setFileUniqueId($up->file_unique_id)
      ->setDuration($up->duration)
      ->setMimeType($up->mime_type ?? self::DEFAULT_PARAM)
      ->setFileSize($up->file_size ?? self::DEFAULT_PARAM);
  }

  public function setFileId(string $fileId): Voice
  {
    $this->file_id = $fileId;
    return $this;
  }

  public function setFileUniqueId(string $fileUniqueId): Voice
  {
    $this->file_unique_id = $fileUniqueId;
    return $this;
  }

  public function setDuration(int $duration): Voice
  {
    $this->duration = $duration;
    return $this;
  }

  public function setMimeType(?string $mimeType): Voice
  {
    $this->mime_type = $mimeType;
    return $this;
  }

  public function setFileSize(?int $fileSize): Voice
  {
    $this->file_size = $fileSize;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}
