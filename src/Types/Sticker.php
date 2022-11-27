<?php 

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

/**
 * This object represents a sticker.
 * 
 * @see https://core.telegram.org/bots/api#sticker
 */
class Sticker extends TypesBase implements TypesInterface
{
  public string $file_id;
  public string $file_unique_id;
  public string $type;
  public int $width;
  public int $height;
  public bool $is_animated = false;
  public bool $is_video = false;
  public ?PhotoSize $thumb;
  public ?string $emoji;
  public ?string $set_name;
  public ?File $premium_animation;
  public ?MaskPosition $mask_position;
  public ?string $custom_emoji_id;
  public ?int $file_size;

  public function __construct(stdClass $up) {
    $this->setFileId($up->file_id)
      ->setFileUniqueId($up->file_unique_id)
      ->setType($up->type)
      ->setWidth($up->width)
      ->setHeight($up->height)
      ->setIsAnimated($up->is_animated ?? self::DEFAULT_BOOL)
      ->setIsVideo($up->is_video ?? self::DEFAULT_BOOL)
      ->setThumb(PhotoSize::create($up->thumb ?? self::DEFAULT_PARAM))
      ->setEmoji($up->emoji ?? self::DEFAULT_PARAM)
      ->setSetName($up->set_name ?? self::DEFAULT_PARAM)
      ->setPremiumAnimation(File::create($up->premium_animation ?? self::DEFAULT_PARAM))
      ->setMaskPosition(MaskPosition::create($up->mask_position ?? self::DEFAULT_PARAM))
      ->setCustomEmojiId($up->custom_emoji_id ?? self::DEFAULT_PARAM)
      ->setFileSize($up->file_size ?? self::DEFAULT_PARAM);
  }

  public function setFileId(string $fileId): Sticker
  {
    $this->file_id = $fileId;
    return $this;
  }

  public function setFileUniqueId(string $fileUniqueId): Sticker
  {
    $this->file_unique_id = $fileUniqueId;
    return $this;
  }

  public function setType(string $type): Sticker
  {
    $this->type = $type;
    return $this;
  }

  public function setWidth(int $width): Sticker
  {
    $this->width = $width;
    return $this;
  }

  public function setHeight(int $heigth): Sticker
  {
    $this->height = $heigth;
    return $this;
  }

  public function setIsAnimated(bool $isAnimated): Sticker
  {
    $this->is_animated = $isAnimated;
    return $this;
  }

  public function setIsVideo(bool $isVideo): Sticker
  {
    $this->is_video = $isVideo;
    return $this;
  }

  public function setThumb(?PhotoSize $thumb): Sticker
  {
    $this->thumb = $thumb;
    return $this;
  }

  public function setEmoji(?string $emoji): Sticker
  {
    $this->emoji = $emoji;
    return $this;
  }

  public function setSetName(string $setName): Sticker
  {
    $this->set_name = $setName;
    return $this;
  }

  public function setPremiumAnimation(?File $premiumAnimation): Sticker
  {
    $this->premium_animation = $premiumAnimation;
    return $this;
  }

  public function setMaskPosition(?MaskPosition $maskPosition): Sticker
  {
    $this->mask_position = $maskPosition;
    return $this;
  }

  public function setCustomEmojiId(?string $customEmojiId): Sticker
  {
    $this->custom_emoji_id = $customEmojiId;
    return $this;
  }

  public function setFileSize(?string $fileSize): Sticker
  {
    $this->file_size = $fileSize;
    return $this;
  }

  public function get()
  {
    $this->getProperties($this);
  }
}
