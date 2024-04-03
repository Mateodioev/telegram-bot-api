<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

/**
 * This object describes a message that can be inaccessible to the bot. It can be one of
 * - Message
 * - InaccessibleMessage
 *
 * @see https://core.telegram.org/bots/api#maybeinaccessiblemessage
 */
class MaybeInaccessibleMessage extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [

        ];
    }

    public static function childs(): array
    {
        return [
            Message::class,
            InaccessibleMessage::class,
        ];
    }
}
