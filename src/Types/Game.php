<?php

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

/**
 * This object represents a game. Use BotFather to create and edit games, their short names will act as unique identifiers.
 * 
 * @see https://core.telegram.org/bots/api#game
 */
class Game extends TypesBase implements TypesInterface
{
  public string $title;
  public string $description;
  public array $photo;
  public ?string $text;
  public ?array $text_entities;
  public ?Animation $animation;

  public function __construct(stdClass $up) {
    $this->setTitle($up->title)
      ->setDescription($up->description)
      ->setPhoto(PhotoSize::bulkCreate($up->photo))
      ->setText($up->text ?? self::DEFAULT_PARAM)
      ->setTextEntities(MessageEntity::bulkCreate($up->text_entities ?? self::DEFAULT_PARAM))
      ->setAnimation(Animation::create($up->animation ?? self::DEFAULT_PARAM));
  }

  public function setTitle(string $title): Game
  {
    $this->title = $title;
    return $this;
  }

  public function setDescription(string $description): Game
  {
    $this->description = $description;
    return $this;
  }

  public function setPhoto(array $photo): Game
  {
    $this->photo = $photo;
    return $this;
  }

  public function setText(?string $text): Game
  {
    $this->text = $text;
    return $this;
  }

  public function setTextEntities(?array $text_entities): Game
  {
    $this->text_entities = $text_entities;
    return $this;
  }

  public function setAnimation(?Animation $animation): Game
  {
    $this->animation = $animation;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}
