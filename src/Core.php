<?php 

namespace Mateodioev\Bots\Telegram;

use function call_user_func_array, method_exists;

/**
 * Create magic methods for Telegram bot API
 */
class Core extends Api
{
    /**
     * Create a new Core instance form env values
     * - Need `BOT_TOKEN` and `BOT_API_LINK`(optional) env vars 
     */
    public static function FromEnv()
    {
        $token = $_ENV['BOT_TOKEN'];
        $api_link = $_ENV['BOT_API_LINK'] ?? self::URL_BASE;

        return new self($token, $api_link);
    }

    /**
     * Call a method of the telegram API.
     */
    public function __call($method, $params)
    {
        if (method_exists($this, $method)) {
            return call_user_func_array([$this, $method], $params);
        }
        return $this->request($method, $params[0] ?? []);
    }

    /**
     * Call a method of the telegram API.
     */
    public static function __callStatic($method, $params)
    {
        if (method_exists(self::class, $method)) {
            return call_user_func_array([self::class, $method], $params);
        }
        return self::FromEnv()->request($method, $params[0] ?? []);
    }
}
