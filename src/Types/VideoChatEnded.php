<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * This object represents a service message about a video chat ended in the chat.
 * 
 * @property integer $duration Video chat duration in seconds
 * 
 * @method integer duration()
 * 
 * @method static setDuration(integer $duration)
 * 
 * @see https://core.telegram.org/bots/api#videochatended
 */
class VideoChatEnded extends baseType
{
    protected array $fields = [
        'duration' => 'integer',
    ];
}
