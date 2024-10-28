<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram;

use Mateodioev\Bots\Telegram\Methods\{
    Method,
    Stickers,
    availableMethods,
    gettingUpdates,
    inlineMode,
    payments,
    updatingMessages
};

use function call_user_func_array;
use function method_exists;

class Api extends Core
{
    use availableMethods;
    use gettingUpdates;
    use updatingMessages;
    use Stickers;
    use inlineMode;
    use payments;

    /**
     * Require `BOT_TOKEN` env var
     */
    public static function fromEnv(): Api
    {
        $token    = $_ENV['BOT_TOKEN'];
        $api_link = $_ENV['BOT_API_LINK'] ?? Core::URL_BASE;

        return new self($token, $api_link);
    }

    public function __call($method, $params)
    {
        if (method_exists($this, $method)) {
            return call_user_func_array([$this, $method], $params);
        }

        return $this->request(Method::create($params[0] ?? [], $method));
    }
}
