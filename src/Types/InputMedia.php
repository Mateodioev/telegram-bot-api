<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldsStorage;
use Mateodioev\Bots\Telegram\Exception\TelegramParamException;

/**
 * This object represents the content of a media message to be sent. It should be one of
 * - InputMediaAnimation
 * - InputMediaAudio
 * - InputMediaDocument
 * - InputMediaLivePhoto
 * - InputMediaPhoto
 * - InputMediaVideo
 *
 * @see https://core.telegram.org/bots/api#inputmedia
 */
class InputMedia extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [

        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }

    public static function childs(): array
    {
        return [
            InputMediaAnimation::class,
            InputMediaAudio::class,
            InputMediaDocument::class,
            InputMediaLivePhoto::class,
            InputMediaPhoto::class,
            InputMediaVideo::class,
        ];
    }

    public static function selectChild(array $update): string
    {
        if (isset($update['type']) === false) {
            throw TelegramParamException::missingField(static::class, 'type');
        }

        return match ($update['type']) {
            'animation' => InputMediaAnimation::class,
            'audio' => InputMediaAudio::class,
            'document' => InputMediaDocument::class,
            'live_photo' => InputMediaLivePhoto::class,
            'photo' => InputMediaPhoto::class,
            'video' => InputMediaVideo::class,
            default => throw TelegramParamException::invalidType(static::class, (string) $update['type']),
        };
    }
}
