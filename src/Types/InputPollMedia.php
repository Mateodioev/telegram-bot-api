<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldsStorage;
use Mateodioev\Bots\Telegram\Exception\TelegramParamException;

/**
 * This object represents the content of a poll description or a quiz explanation to be sent. It should be one of
 * - InputMediaAnimation
 * - InputMediaAudio
 * - InputMediaDocument
 * - InputMediaLivePhoto
 * - InputMediaLocation
 * - InputMediaPhoto
 * - InputMediaVenue
 * - InputMediaVideo
 *
 * @see https://core.telegram.org/bots/api#inputpollmedia
 */
class InputPollMedia extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }

    public static function childs(): array
    {
        return [
            InputMediaAnimation::class,
            InputMediaAudio::class,
            InputMediaDocument::class,
            InputMediaLivePhoto::class,
            InputMediaLocation::class,
            InputMediaPhoto::class,
            InputMediaVenue::class,
            InputMediaVideo::class,
        ];
    }

    public static function selectChild(array $update): string
    {
        if (($update["type"] ?? null) === null) {
            throw TelegramParamException::missingField(static::class, "type");
        }

        return match ($update["type"]) {
            "animation"  => InputMediaAnimation::class,
            "audio"      => InputMediaAudio::class,
            "document"   => InputMediaDocument::class,
            "live_photo" => InputMediaLivePhoto::class,
            'location'   => InputMediaLocation::class,
            "photo"      => InputMediaPhoto::class,
            "venue"      => InputMediaVenue::class,
            "video"      => InputMediaVideo::class,
            default      => throw TelegramParamException::invalidType(static::class, "type"),
        };
    }
}
