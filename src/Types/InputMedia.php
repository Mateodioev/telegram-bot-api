<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Exception\TelegramParamException;

/**
 * This object represents the content of a media message to be sent. It should be one of
 * - InputMediaAnimation
 * - InputMediaDocument
 * - InputMediaAudio
 * - InputMediaPhoto
 * - InputMediaVideo
 *
 * @see https://core.telegram.org/bots/api#inputmedia
 */
class InputMedia extends abstractType
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
            InputMediaAnimation::class,
            InputMediaDocument::class,
            InputMediaAudio::class,
            InputMediaPhoto::class,
            InputMediaVideo::class,
        ];
    }

    public static function selectChild(array $update): string
    {
        if (($update['type'] ?? null) === null) {
            throw TelegramParamException::missingField(static::class, 'type');
        }

        return match ($update['type']) {
            'photo' => InputMediaPhoto::class,
            'video' => InputMediaVideo::class,
            'animation' => InputMediaAnimation::class,
            'audio' => InputMediaAudio::class,
            'document' => InputMediaDocument::class,
            default => throw TelegramParamException::invalidType(static::class, 'type'),
        };
    }
}
