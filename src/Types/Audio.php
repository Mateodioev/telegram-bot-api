<?php 

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

/**
 * This object represents an audio file to be treated as music by the Telegram clients.
 * 
 * @see https://core.telegram.org/bots/api#audio
 */
class Audio extends TypesBase implements TypesInterface
{
  public string $file_id;
  public string $file_unique_id;
  public int $duration;
  public ?string $performer;
  public ?string $title;
  public ?string $file_name;
  public ?string $mime_type;
  public ?int $file_size;

  public function __construct(?stdClass $up) {
    $this->setFileId($up->file_id)
      ->setFileUniqueId($up->file_unique_id)
      ->setDuration($up->duration)
      ->setPerformer($up->performer ?? self::DEFAULT_PARAM)
      ->setTitle($up->title ?? self::DEFAULT_PARAM)
      ->setFileName($up->file_name ?? self::DEFAULT_PARAM)
      ->setMimeType($up->mime_type ?? self::DEFAULT_PARAM)
      ->setFileSize($up->file_size ?? self::DEFAULT_PARAM);
  }

  public function setFileId(string $fileId): Audio
  {
    $this->file_id = $fileId;
    return $this;
  }

  public function setFileUniqueId(string $fileUniqueId): Audio
  {
    $this->file_unique_id = $fileUniqueId;
    return $this;
  }

  public function setDuration(int $duration): Audio
  {
    $this->duration = $duration;
    return $this;
  }

  public function setPerformer(?string $performer): Audio
  {
    $this->performer = $performer;
    return $this;
  }

  public function setTitle(?string $title): Audio
  {
    $this->title = $title;
    return $this;
  }

  public function setFileName(?string $fileName): Audio
  {
    $this->file_name = $fileName;
    return $this;
  }

  public function setMimeType(?string $mimeType): Audio
  {
    $this->mime_type = $mimeType;
    return $this;
  }

  public function setFileSize(?string $fileSize): Audio
  {
    $this->file_size = $fileSize;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}

