<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldsStorage;
use Mateodioev\Bots\Telegram\Exception\TelegramParamException;

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
        $this->fields = [];
        FieldsStorage::instance()->add(static::class, $this->fields);
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

    public static function selectChild(array $update): string
    {
        if (isset($update['type']) === false) {
            throw new TelegramParamException('Missing type field in MessageOrigin');
        }

        return match ($update['type']) {
            'user' => MessageOriginUser::class,
            'hidden_user' => MessageOriginHiddenUser::class,
            'chat' => MessageOriginChat::class,
            'channel' => MessageOriginChannel::class,
            default => throw new TelegramParamException('Invalid type: ' . $update['type'] . ' in MessageOrigin')
        };
    }
}
