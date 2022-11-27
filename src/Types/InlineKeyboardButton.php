<?php

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

/**
 * This object represents one button of an inline keyboard. You must use exactly one of the optional fields.
 * 
 * @see https://core.telegram.org/bots/api#inlinekeyboardbutton
 */
class InlineKeyboardButton extends TypesBase implements TypesInterface
{
  public string $text;
  public ?string $url;
  public ?string $callback_data;
  public ?WebAppInfo $web_app;
  public ?LoginUrl $login_url;
  public ?string $switch_inline_query;
  public ?string $switch_inline_query_current_chat;
  public ?CallbackGame $callback_game;
  public ?bool $pay;

  public function __construct(stdClass $up) {
    $this->setText($up->text)
      ->setUrl($up->url ?? self::DEFAULT_PARAM)
      ->setCallbackData($up->callback_data ?? self::DEFAULT_PARAM)
      ->setWebApp(WebAppInfo::create($up->web_app ?? self::DEFAULT_PARAM))
      ->setLoginUrl(LoginUrl::create($up->login_url ?? self::DEFAULT_PARAM))
      ->setSwitchInlineQuery($up->switch_inline_query ?? self::DEFAULT_PARAM)
      ->setSwitchInlineQueryCurrentChat($up->switch_inline_query_current_chat ?? self::DEFAULT_PARAM)
      ->setCallbackGame(CallbackGame::create($up->callback_game ?? self::DEFAULT_PARAM))
      ->setPay($up->pay ?? self::DEFAULT_PARAM);
  }

  public function setText(string $text): InlineKeyboardButton
  {
    $this->text = $text;
    return $this;
  }

  public function setUrl(?string $url): InlineKeyboardButton
  {
    $this->url = $url;
    return $this;
  }

  public function setCallbackData(?string $callback_data): InlineKeyboardButton
  {
    $this->callback_data = $callback_data;
    return $this;
  }

  public function setWebApp(?WebAppInfo $web_app): InlineKeyboardButton
  {
    $this->web_app = $web_app;
    return $this;
  }

  public function setLoginUrl(?LoginUrl $login_url): InlineKeyboardButton
  {
    $this->login_url = $login_url;
    return $this;
  }

  public function setSwitchInlineQuery(?string $switch_inline_query): InlineKeyboardButton
  {
    $this->switch_inline_query = $switch_inline_query;
    return $this;
  }

  public function setSwitchInlineQueryCurrentChat(?string $switch_inline_query_current_chat): InlineKeyboardButton
  {
    $this->switch_inline_query_current_chat = $switch_inline_query_current_chat;
    return $this;
  }

  public function setCallbackGame(?CallbackGame $callback_game): InlineKeyboardButton
  {
    $this->callback_game = $callback_game;
    return $this;
  }

  public function setPay(?bool $pay): InlineKeyboardButton
  {
    $this->pay = $pay;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}
