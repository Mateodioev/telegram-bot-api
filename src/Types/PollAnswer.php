<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents an answer of a user in a non-anonymous poll.
 *
 * @see https://core.telegram.org/bots/api#pollanswer
 */
class PollAnswer extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'poll_id'    => FieldType::single('string'),
            'voter_chat' => FieldType::optional(Chat::class),
            'user'       => FieldType::optional(User::class),
            'option_ids' => FieldType::multiple('integer'),
        ];
    }
}
