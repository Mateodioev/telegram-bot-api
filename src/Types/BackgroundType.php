<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Exception\TelegramParamException;

/**
 * This object describes the type of a background. Currently, it can be one of
 * - BackgroundTypeFill
 * - BackgroundTypeWallpaper
 * - BackgroundTypePattern
 * - BackgroundTypeChatTheme
 *
 * @see https://core.telegram.org/bots/api#backgroundtype
 */
class BackgroundType extends abstractType
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
            BackgroundTypeFill::class,
            BackgroundTypeWallpaper::class,
            BackgroundTypePattern::class,
            BackgroundTypeChatTheme::class,
        ];
    }

    public static function selectChild(array $update): string
    {
        if (isset($update['type']) === false) {
            throw TelegramParamException::missingField(static::class, 'type');
        }

        return match ($update['type']) {
            'fill' => BackgroundTypeFill::class,
            'wallpaper' => BackgroundTypeWallpaper::class,
            'pattern' => BackgroundTypePattern::class,
            'chat_theme' => BackgroundTypeChatTheme::class,
            default => throw TelegramParamException::invalidType(static::class, (string) $update['type'])
        };
    }
}
