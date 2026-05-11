<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldsStorage;
use Mateodioev\Bots\Telegram\Exception\TelegramParamException;

/**
 * This object describes the paid media to be sent. Currently, it can be one of
 * - InputPaidMediaLivePhoto
 * - InputPaidMediaPhoto
 * - InputPaidMediaVideo
 *
 * @see https://core.telegram.org/bots/api#inputpaidmedia
 */
class InputPaidMedia extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }

    public static function childs(): array
    {
        return [
            InputPaidMediaLivePhoto::class,
            InputPaidMediaPhoto::class,
            InputPaidMediaVideo::class,
        ];
    }

    public static function selectChild(array $update): string
    {
        if (isset($update['type']) === false) {
            TelegramParamException::missingField(static::class, 'type');
        }

        return match ($update['type']) {
            'live_photo' => InputPaidMediaLivePhoto::class,
            'photo' => InputPaidMediaPhoto::class,
            'video' => InputPaidMediaVideo::class,
            default => TelegramParamException::invalidType(static::class, (string) $update['type']),
        };
    }
}
