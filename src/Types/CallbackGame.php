<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

/**
 * A placeholder, currently holds no information. Use BotFather to set up your game.
 *
 * @see https://core.telegram.org/bots/api#callbackgame
 */
class CallbackGame extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [

        ];
    }
}
