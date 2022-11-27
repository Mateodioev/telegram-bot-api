<?php 

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

/**
 * This object represents an incoming inline query. When the user sends an empty query, your bot could return some default or trending results.
 * 
 * @see https://core.telegram.org/bots/api#inlinequery
 */
class InlineQuery extends TypesBase implements TypesInterface
{
  public string $id;
  public User $from;
  public string $query;
  public string $offset;
  public ?string $chat_type;
  public ?Location $location;

  public function __construct(stdClass $up) {
    $this->setId($up->id)
      ->setFrom(User::create($up->from ?? self::DEFAULT_PARAM))
      ->setQuery($up->query)
      ->setOffset($up->offset)
      ->setChatType($up->chat_type ?? self::DEFAULT_PARAM)
      ->setLocation(Location::create($up->location ?? self::DEFAULT_PARAM));
  }
  public function setId(string $id): InlineQuery
  {
    $this->id = $id;
    return $this;
  }

  public function setFrom(User $from): InlineQuery
  {
    $this->from = $from;
    return $this;
  }

  public function setQuery(string $query): InlineQuery
  {
    $this->query = $query;
    return $this;
  }

  public function setOffset(string $offset): InlineQuery
  {
    $this->offset = $offset;
    return $this;
  }

  public function setChatType(?string $chatType): InlineQuery
  {
    $this->chat_type = $chatType;
    return $this;
  }

  public function setLocation(?Location $location): InlineQuery
  {
    $this->location = $location;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}
