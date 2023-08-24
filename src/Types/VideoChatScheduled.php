<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents a service message about a video chat scheduled in the chat.
 *
 * @see https://core.telegram.org/bots/api#videochatscheduled
 */
class VideoChatScheduled extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'start_date' => FieldType::single('integer'),
        ];
    }
}
