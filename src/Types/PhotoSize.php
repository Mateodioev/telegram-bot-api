<?php 

namespace Mateodioev\Bots\Telegram\Types;

use stdClass;

/**
 * This object represents one size of a photo or a file / sticker thumbnail.
 */
class PhotoSize extends TypesBase implements TypesInterface
{
  public string $file_id;
  public string $file_unique_id;
  public int $width;
  public int $height;
  public int $file_size;

  public function __construct(stdClass $up) {
    $this->setFileId($up->file_id)
    ->setWidth($up->width)
    ->setHeight($up->height)
    ->setFileSize($up->file_size);
  }

  public static function create(?stdClass $up): ?PhotoSize
  {
    if (is_null($up)) null;

    return new self($up);
  }

  public static function createPhotoSizes(?array $photoSizes): ?array
  {
    if (is_null($photoSizes)) return null;

    return array_map(['self', 'create'], $photoSizes);
  }

  public function setFileId(string $fileId): PhotoSize
  {
    $this->file_id = $fileId;
    return $this;
  }

  public function setFileUniqueId(string $fileUniqueId): PhotoSize
  {
    $this->file_unique_id = $fileUniqueId;
    return $this;
  }

  public function setWidth(int $width): PhotoSize
  {
    $this->width = $width;
    return $this;
  }

  public function setHeight(int $height): PhotoSize
  {
    $this->height = $height;
    return $this;
  }

  public function setFileSize(int $fileSize): PhotoSize
  {
    $this->file_size = $fileSize;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}