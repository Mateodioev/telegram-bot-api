<?php 

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

/**
 * This object represents a general file (as opposed to photos, voice messages and audio files).
 * 
 * @see https://core.telegram.org/bots/api#document
 */
class Document extends TypesBase implements TypesInterface
{
  public string $file_id;
  public string $file_unique_id;
  public ?PhotoSize $thumb;
  public ?string $file_name;
  public ?string $mime_type;
  public ?int $file_size;

  public function __construct(?stdClass $up) {
    $this->setFileId($up->file_id)
      ->setFileUniqueId($up->file_unique_id)
      ->setThumb(PhotoSize::create($up->thumb ?? self::DEFAULT_PARAM))
      ->setFileName($up->file_name ?? self::DEFAULT_PARAM)
      ->setMimeType($up->mime_type ?? self::DEFAULT_PARAM)
      ->setFileSize($up->file_size ?? self::DEFAULT_PARAM);
  }

  public function setFileId(string $fileId): Document
  {
    $this->file_id = $fileId;
    return $this;
  }

  public function setFileUniqueId(string $fileUniqueId): Document
  {
    $this->file_unique_id = $fileUniqueId;
    return $this;
  }

  public function setThumb(?PhotoSize $thumb): Document
  {
    $this->thumb = $thumb;
    return $this;
  }

  public function setFileName(?string $fileName): Document
  {
    $this->file_name = $fileName;
    return $this;
  }

  public function setMimeType(?string $mimeType): Document
  {
    $this->mime_type = $mimeType;
    return $this;
  }

  public function setFileSize(?string $fileSize): Document
  {
    $this->file_size = $fileSize;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}
