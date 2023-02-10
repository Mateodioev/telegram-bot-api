<?php 

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

/**
 * This object represents one size of a photo or a file / sticker thumbnail.
 *
 * @see https://core.telegram.org/bots/api#photosize
 */
class PhotoSize extends TypesBase implements TypesInterface
{
  public string $file_id;
  public string $file_unique_id;
  public int $width;
  public int $height;
  public ?int $file_size;

  public function __construct(stdClass $up) {
    $this->setFileId($up->file_id)
      ->setFileUniqueId($up->file_unique_id)
      ->setWidth($up->width)
      ->setHeight($up->height)
      ->setFileSize($up->file_size ?? self::DEFAULT_PARAM);
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

  public function setFileSize(?int $fileSize): PhotoSize
  {
    $this->file_size = $fileSize;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}
