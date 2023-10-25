<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object contains information about one answer option in a poll.
 *
 * @property string $text Option text, 1-100 characters
 * @property int $voter_count Number of users that voted for this option
 *
 * @method string text()
 * @method int voterCount()
 *
 * @method static setText(string $text)
 * @method static setVoterCount(int $voterCount)
 *
 * @see https://core.telegram.org/bots/api#polloption
 */
class PollOption extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'text'        => FieldType::single('string'),
            'voter_count' => FieldType::single('integer'),
        ];
    }
}
