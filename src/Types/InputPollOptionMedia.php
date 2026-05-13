<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldsStorage;
use Mateodioev\Bots\Telegram\Exception\TelegramParamException;

/**
 * This object represents the content of a poll option to be sent. It should be one of
 * - InputMediaAnimation
 * - InputMediaLivePhoto
 * - InputMediaLocation
 * - InputMediaPhoto
 * - InputMediaSticker
 * - InputMediaVenue
 * - InputMediaVideo
 *
 * @see https://core.telegram.org/bots/api#inputpolloptionmedia
 */
class InputPollOptionMedia extends abstractType
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
            InputMediaLivePhoto::class,
            InputMediaLocation::class,
            InputMediaPhoto::class,
            InputMediaSticker::class,
            InputMediaVenue::class,
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
            'live_photo' => InputMediaLivePhoto::class,
            'location' => InputMediaLocation::class,
            'photo' => InputMediaPhoto::class,
            'sticker' => InputMediaSticker::class,
            'venue' => InputMediaVenue::class,
            'video' => InputMediaVideo::class,
            default => throw TelegramParamException::invalidType(static::class, (string) $update['type']),
        };
    }
}
