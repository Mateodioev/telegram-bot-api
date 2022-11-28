<?php

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

/**
 * This object represents a sticker set.
 * 
 * @see https://core.telegram.org/bots/api#stickerset
 */
class StickerSet extends TypesBase implements TypesInterface
{
  public string $name;
  public string $title;
  public string $sticker_type;
  public bool $is_animated = self::DEFAULT_BOOL;
  public bool $is_video = self::DEFAULT_BOOL;
  public array $stickers = [];
  public ?PhotoSize $thumb;

  public function __construct(stdClass $up) {
    $this->setName($up->name)
      ->setTitle($up->title)
      ->setStickerType($up->sticker_type)
      ->setIsAnimated($up->is_animated ?? self::DEFAULT_BOOL)
      ->setIsVideo(self::DEFAULT_BOOL)
      ->setStickers(Sticker::bulkCreate($up->stickers))
      ->setThumb(PhotoSize::create($up->thumb ?? self::DEFAULT_PARAM));
  }

  public function setName(string $name): StickerSet
  {
    $this->name = $name;
    return $this;
  }

  public function setTitle(string $title): StickerSet
  {
    $this->title = $title;
    return $this;
  }

  public function setStickerType(string $sticker_type): StickerSet
  {
    $this->sticker_type = $sticker_type;
    return $this;
  }

  public function setIsAnimated(bool $is_animated): StickerSet
  {
    $this->is_animated = $is_animated;
    return $this;
  }

  public function setIsVideo(bool $is_video): StickerSet
  {
    $this->is_video = $is_video;
    return $this;
  }

  public function setStickers(array $stickers): StickerSet
  {
    $this->stickers = $stickers;
    return $this;
  }

  public function setThumb(?PhotoSize $thumb): StickerSet
  {
    $this->thumb = $thumb;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}
