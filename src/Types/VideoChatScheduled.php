<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * This object represents a service message about a video chat scheduled in the chat.
 * 
 * @property integer $start_date Point in time (Unix timestamp) when the video chat is supposed to be started by a chat administrator
 * 
 * @method integer startDate()
 * 
 * @method static setStartDate(integer $startDate)
 * 
 * @see https://core.telegram.org/bots/api#videochatscheduled
 */
class VideoChatScheduled extends baseType
{
    protected array $fields = [
        'start_date' => 'integer',
    ];
}
