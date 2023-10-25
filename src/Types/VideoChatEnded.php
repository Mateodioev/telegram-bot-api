<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents a service message about a video chat ended in the chat.
 *
 * @property int $duration Video chat duration in seconds
 *
 * @method int duration()
 *
 * @method static setDuration(int $duration)
 *
 * @see https://core.telegram.org/bots/api#videochatended
 */
class VideoChatEnded extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'duration' => FieldType::single('integer'),
        ];
    }
}
