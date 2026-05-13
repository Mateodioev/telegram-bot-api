<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldsStorage;
use Mateodioev\Bots\Telegram\Exception\TelegramParamException;

/**
 * This object describes the way a background is filled based on the selected colors. Currently, it can be one of
 * - BackgroundFillSolid
 * - BackgroundFillGradient
 * - BackgroundFillFreeformGradient
 *
 * @see https://core.telegram.org/bots/api#backgroundfill
 */
class BackgroundFill extends abstractType
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
            BackgroundFillSolid::class,
            BackgroundFillGradient::class,
            BackgroundFillFreeformGradient::class,
        ];
    }

    public static function selectChild(array $update): string
    {
        if (isset($update['type']) === false) {
            throw TelegramParamException::missingField(static::class, 'type');
        }

        return match ($update['type']) {
            'solid' => BackgroundFillSolid::class,
            'gradient' => BackgroundFillGradient::class,
            'freeform_gradient' => BackgroundFillFreeformGradient::class,
            default => throw TelegramParamException::invalidType(static::class, (string) $update['type']),
        };
    }
}
