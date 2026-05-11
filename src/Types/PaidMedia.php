<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldsStorage;
use Mateodioev\Bots\Telegram\Exception\TelegramParamException;

/**
 * This object describes paid media. Currently, it can be one of
 * - PaidMediaLivePhoto
 * - PaidMediaPhoto
 * - PaidMediaPreview
 * - PaidMediaVideo
 *
 * @see https://core.telegram.org/bots/api#paidmedia
 */
class PaidMedia extends abstractType
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
            PaidMediaLivePhoto::class,
            PaidMediaPhoto::class,
            PaidMediaPreview::class,
            PaidMediaVideo::class,
        ];
    }

    public static function selectChild(array $update): string
    {
        if (isset($update['type']) === false) {
            TelegramParamException::missingField(static::class, 'type');
        }

        return match ($update['type']) {
            'live_photo' => PaidMediaLivePhoto::class,
            'photo' => PaidMediaPhoto::class,
            'preview' => PaidMediaPreview::class,
            'video' => PaidMediaVideo::class,
            default => TelegramParamException::invalidType(static::class, (string) $update['type']),
        };
    }
}
