<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldsStorage;

/**
 * This object describes the content of a story to post. Currently, it can be one of
 * - InputStoryContentPhoto
 * - InputStoryContentVideo
 *
 * @see https://core.telegram.org/bots/api#inputstorycontent
 */
class InputStoryContent extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }

    public static function childs(): array
    {
        return [
            InputStoryContentPhoto::class,
            InputStoryContentVideo::class,
        ];
    }

    public static function selectChild(array $update): string
    {
        if (isset($update['type']) === false) {
            throw TelegramParamException::missingField(static::class, 'type');
        }

        return match ($update['type']) {
            'photo' => InputStoryContentPhoto::class,
            'video' => InputStoryContentVideo::class,
        };
    }
}
