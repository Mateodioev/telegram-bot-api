<?php 

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

/**
 * This object represents an animation file (GIF or H.264/MPEG-4 AVC video without sound).
 * 
 * @see https://core.telegram.org/bots/api#animation
 */
class Animation extends TypesBase implements TypesInterface
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

  public function setFileId(string $fileId): Animation
  {
    $this->file_id = $fileId;
    return $this;
  }

  public function setFileUniqueId(string $fileUniqueId): Animation
  {
    $this->file_unique_id = $fileUniqueId;
    return $this;
  }

  public function setWidth(int $width): Animation
  {
    $this->width = $width;
    return $this;
  }

  public function setHeight(int $heigth): Animation
  {
    $this->height = $heigth;
    return $this;
  }

  public function setDuration(int $duration): Animation
  {
    $this->duration = $duration;
    return $this;
  }

  public function setThumb(?PhotoSize $thumb): Animation
  {
    $this->thumb = $thumb;
    return $this;
  }

  public function setFileName(?string $fileName): Animation
  {
    $this->file_name = $fileName;
    return $this;
  }

  public function setMimeType(?string $mimeType): Animation
  {
    $this->mime_type = $mimeType;
    return $this;
  }

  public function setFileSize(?string $fileSize): Animation
  {
    $this->file_size = $fileSize;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}
