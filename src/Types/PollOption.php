<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * This object contains information about one answer option in a poll.
 * 
 * @property string  $text        Option text, 1 - 100 characters
 * @property integer $voter_count Number of users that voted for this option
 * 
 * @method string  text()
 * @method integer voterCount()
 * 
 * @method static setText(string $text)
 * @method static setVoterCount(integer $voterCount)
 * 
 * @see https://core.telegram.org/bots/api#polloption
 */
class PollOption extends baseType
{
    protected array $fields = [
        'text'        => 'string',
        'voter_count' => 'integer',
    ];
}
