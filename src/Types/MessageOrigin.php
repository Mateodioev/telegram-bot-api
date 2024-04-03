<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

/**
 * This object describes the origin of a message. It can be one of
 * - MessageOriginUser
 * - MessageOriginHiddenUser
 * - MessageOriginChat
 * - MessageOriginChannel
 *
 * @see https://core.telegram.org/bots/api#messageorigin
 */
class MessageOrigin extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [

        ];
    }

    public static function childs(): array
    {
        return [
            MessageOriginUser::class,
            MessageOriginHiddenUser::class,
            MessageOriginChat::class,
            MessageOriginChannel::class,
        ];
    }
}
