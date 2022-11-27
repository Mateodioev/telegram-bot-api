<?php

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

/**
 * This object represents an incoming callback query from a callback button in an inline keyboard.
 * If the button that originated the query was attached to a message sent by the bot, the field message will be present. If the button was attached to a message sent via the bot (in inline mode), the field inline_message_id will be present. Exactly one of the fields data or game_short_name will be present.
 * 
 * @see https://core.telegram.org/bots/api#callbackquery
 */
class CallbackQuery extends TypesBase implements TypesInterface
{
  public string $id;
  public User $from;
  public ?Message $message;
  public ?string $inline_message_id;
  public string $chat_instance;
  public ?string $data;
  public ?string $game_short_name;

  public function __construct(stdClass $up) {
    $this->setId($up->id)
      ->setFrom(User::create($up->from))
      ->setMessage(Message::create($up->message ?? self::DEFAULT_PARAM))
      ->setInlineMessageId($up->inline_message_id ?? self::DEFAULT_PARAM)
      ->setChatInstance($up->chat_instance)
      ->setData($up->data ?? self::DEFAULT_PARAM)
      ->setGameShortName($up->game_short_name ?? self::DEFAULT_PARAM);
  }

  public function setId(string $id): CallbackQuery
  {
    $this->id = $id;
    return $this;
  }

  public function setFrom(User $from): CallbackQuery
  {
    $this->from = $from;
    return $this;
  }

  public function setMessage(?Message $message): CallbackQuery
  {
    $this->message = $message;
    return $this;
  }

  public function setInlineMessageId(?string $inline_message_id): CallbackQuery
  {
    $this->inline_message_id = $inline_message_id;
    return $this;
  }

  public function setChatInstance(string $chat_instance): CallbackQuery
  {
    $this->chat_instance = $chat_instance;
    return $this;
  }

  public function setData(?string $data): CallbackQuery
  {
    $this->data = $data;
    return $this;
  }

  public function setGameShortName(?string $game_short_name): CallbackQuery
  {
    $this->game_short_name = $game_short_name;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}
