<?php 

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

/**
 * This object represents a video message (available in Telegram apps as of v.4.0).
 * 
 * @see https://core.telegram.org/bots/api#videonote
 */
class VideoNote extends TypesBase implements TypesInterface
{
  public string $file_id;
  public string $file_unique_id;
  public int $length;
  public int $duration;
  public ?PhotoSize $thumb;
  public ?int $file_size;

  public function __construct(stdClass $up) {
    $this->setFileId($up->file_id)
      ->setFileUniqueId($up->file_unique_id)
      ->setLength($up->length)
      ->setDuration($up->duration)
      ->setThumb(PhotoSize::create($up->thumb ?? self::DEFAULT_PARAM))
      ->setFileSize($up->file_size ?? self::DEFAULT_PARAM);
  }

  public function setFileId(string $fileId): VideoNote
  {
    $this->file_id = $fileId;
    return $this;
  }

  public function setFileUniqueId(string $fileUniqueId): VideoNote
  {
    $this->file_unique_id = $fileUniqueId;
    return $this;
  }

  public function setLength(int $length): VideoNote
  {
    $this->length = $length;
    return $this;
  }

  public function setDuration(int $duration): VideoNote
  {
    $this->duration = $duration;
    return $this;
  }

  public function setThumb(?PhotoSize $thumb): VideoNote
  {
    $this->thumb = $thumb;
    return $this;
  }

  public function setFileSize(?int $fileSize): VideoNote
  {
    $this->file_size = $fileSize;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}
