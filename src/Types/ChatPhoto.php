<?php 

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

/**
 * This object represents a chat photo.
 * 
 * @see https://core.telegram.org/bots/api#chatphoto
 */
class ChatPhoto extends TypesBase implements TypesInterface
{
  public string $small_file_id;
  public string $small_file_unique_id;
  public string $big_file_id;
  public string $big_file_unique_id;

  public function __construct(stdClass $up) {
    $this->setSmallFileId($up->small_file_id)
      ->setSmallFileUniqueId($up->small_file_unique_id)
      ->setBigFileId($up->big_file_id)
      ->setBigFileUniqueId($up->big_file_unique_id);
  }

  public function setSmallFileId(string $smallFileId): ChatPhoto
  {
    $this->small_file_id = $smallFileId;
    return $this;
  }

  public function setSmallFileUniqueId(string $smallFileUniqueId): ChatPhoto
  {
    $this->small_file_unique_id = $smallFileUniqueId;
    return $this;
  }

  public function setBigFileId(string $bigFileId): ChatPhoto
  {
    $this->big_file_id = $bigFileId;
    return $this;
  }

  public function setBigFileUniqueId(string $bigFileUniqueId): ChatPhoto
  {
    $this->big_file_unique_id = $bigFileUniqueId;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}
