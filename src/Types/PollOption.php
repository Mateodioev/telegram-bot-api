<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object contains information about one answer option in a poll.
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
