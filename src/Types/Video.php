<?php 

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use Mateodioev\Bots\Telegram\Types\{PhotoSize, TypesBase};
use stdClass;

/**
 * This object represents a video file.
 * 
 * @see https://core.telegram.org/bots/api#video
 */
class Video extends TypesBase implements TypesInterface
{
  public string $file_id;
  public string $file_unique_id;
  public int $width;
  public int $height;
  public int $duration;
  public ?PhotoSize $thumb;
  public ?string $file_name;
  public ?string $mime_type;
  public ?int $file_size;

  public function __construct(stdClass $up) {
    $this->setFileId($up->file_id)
      ->setFileUniqueId($up->file_unique_id)
      ->setWidth($up->width)
      ->setHeight($up->height)
      ->setDuration($up->duration)
      ->setThumb(PhotoSize::create($up->thumb ?? self::DEFAULT_PARAM))
      ->setFileName($up->file_name ?? self::DEFAULT_PARAM)
      ->setMimeType($up->mime_type ?? self::DEFAULT_PARAM)
      ->setFileSize($up->file_size ?? self::DEFAULT_PARAM);
  }

  public function setFileId(string $fileId): Video
  {
    $this->file_id = $fileId;
    return $this;
  }

  public function setFileUniqueId(string $fileUniqueId): Video
  {
    $this->file_unique_id = $fileUniqueId;
    return $this;
  }

  public function setWidth(int $width): Video
  {
    $this->width = $width;
    return $this;
  }

  public function setHeight(int $height): Video
  {
    $this->height = $height;
    return $this;
  }

  public function setDuration(int $duration): Video
  {
    $this->duration = $duration;
    return $this;
  }

  public function setThumb(?PhotoSize $thumb): Video
  {
    $this->thumb = $thumb;
    return $this;
  }

  public function setFileName(?string $fileName): Video
  {
    $this->file_name = $fileName;
    return $this;
  }

  public function setMimeType(?string $mimeType): Video
  {
    $this->mime_type = $mimeType;
    return $this;
  }

  public function setFileSize(?int $fileSize): Video
  {
    $this->file_size = $fileSize;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}
