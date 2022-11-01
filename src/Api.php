<?php 

namespace Mateodioev\Bots\Telegram;

use Mateodioev\Bots\Telegram\Methods\{Method, Senders, SetGet, Stickers, Updates};

use function method_exists, call_user_func_array;

class Api extends Core
{
  use Senders;
  use Updates;
  use Stickers;
  use SetGet;

  /**
   * Require `BOT_TOKEN` env var
   */
  public static function fromEnv(): Api
  {
    $token    = $_ENV['BOT_TOKEN'];
    $api_link = $_ENV['BOT_API_LINK'] ?? self::URL_BASE;

    return new static($token, $api_link);
  }

  public function __call($method, $params)
  {
    if (method_exists($this, $method)) {
      return call_user_func_array([$this, $method], $params);
    }
    return $this->request(Method::create($params[0] ?? [], $method));
  }
}
