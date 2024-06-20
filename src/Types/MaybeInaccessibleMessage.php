<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Exception\TelegramParamException;

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
        if ($this->fields !== null) {
            // Already booted
            return;
        }
        $this->fields = [];
    }

    public static function childs(): array
    {
        return [
            Message::class,
            InaccessibleMessage::class,
        ];
    }

    public static function selectChild(array $update): string
    {
        if (isset($update['date']) === false) {
            throw TelegramParamException::missingField(static::class, 'date');
        }

        if ($update['date'] === 0) {
            return InaccessibleMessage::class;
        } else {
            return Message::class;
        }
    }
}
