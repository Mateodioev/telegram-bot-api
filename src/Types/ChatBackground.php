<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents a chat background.
 *
 * @property BackgroundType $type Type of the background
 *
 * @method BackgroundType type()
 *
 * @method static setType(BackgroundType $type)
 *
 * @see https://core.telegram.org/bots/api#chatbackground
 */
class ChatBackground extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'type' => FieldType::single(BackgroundType::class),
        ];
    }
}
