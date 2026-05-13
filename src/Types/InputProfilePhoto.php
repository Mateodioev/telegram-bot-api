<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldsStorage;
use Mateodioev\Bots\Telegram\Exception\TelegramParamException;

/**
 * This object describes a profile photo to set. Currently, it can be one of
 * - InputProfilePhotoStatic
 * - InputProfilePhotoAnimated
 *
 * @see https://core.telegram.org/bots/api#inputprofilephoto
 */
class InputProfilePhoto extends abstractType
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
            InputProfilePhotoStatic::class,
            InputProfilePhotoAnimated::class,
        ];
    }

    public static function selectChild(array $update): string
    {
        if (isset($update['type']) === false) {
            throw TelegramParamException::missingField(static::class, 'type');
        }

        return match ($update['type']) {
            'static' => InputProfilePhotoStatic::class,
            'animated' => InputProfilePhotoAnimated::class,
            default => throw TelegramParamException::invalidType(static::class, (string) $update['type']),
        };
    }
}
