<?php

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

/**
 * This object represent a user's profile pictures.
 * 
 * @see https://core.telegram.org/bots/api#userprofilephotos
 */
class UserProfilePhotos extends TypesBase implements TypesInterface
{
  public int $total_count;
  public array $photos;

  public function __construct(stdClass $up) {
    $this->setTotalCount($up->total_count);
    $this->setPhotos(PhotoSize::bulkCreate($up->photos));
  }

  public function setTotalCount(int $totalCount): UserProfilePhotos
  {
    $this->total_count = $totalCount;
    return $this;
  }

  public function setPhotos(array $photos): UserProfilePhotos
  {
    $this->photos = $photos;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}
