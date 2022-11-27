<?php 

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

/**
 * This object represents a file ready to be downloaded. The file can be downloaded via the link `https://api.telegram.org/file/bot<token>/<file_path>`
 * 
 * @see https://core.telegram.org/bots/api#file
 */
class File extends TypesBase implements TypesInterface
{
  public string $file_id;
  public string $file_unique_id;
  public ?int $file_size;
  public ?string $file_path;

  public function __construct(stdClass $up) {
    $this->setFileId($up->file_id)
      ->setFileUniqueId($up->file_unique_id)
      ->setFileSize($up->file_size ?? self::DEFAULT_PARAM)
      ->setFilePath($up->file_path ?? self::DEFAULT_PARAM);
  }

  public function setFileId(string $fileId): File
  {
    $this->file_id = $fileId;
    return $this;
  }

  public function setFileUniqueId(string $fileUniqueId): File
  {
    return $this->file_unique_id = $fileUniqueId;
    return $this;
  }

  public function setFileSize(?int $fileSize = self::DEFAULT_PARAM): File
  {
    $this->file_size = $fileSize;
    return $this;
  }

  public function setFilePath(?string $filePath): File
  {
    $this->file_path = $filePath;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}
