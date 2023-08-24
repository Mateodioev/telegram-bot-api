<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents a service message about a video chat scheduled in the chat.
 *
 * @property int $start_date Point in time (Unix timestamp) when the video chat is supposed to be started by a chat administrator
 *
 * @method int startDate()
 *
 * @method static setStartDate(int $startDate)
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
