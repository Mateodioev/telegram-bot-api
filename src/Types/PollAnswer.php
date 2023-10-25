<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents an answer of a user in a non-anonymous poll.
 *
 * @property string $poll_id Unique poll identifier
 * @property Chat|null $voter_chat Optional. The chat that changed the answer to the poll, if the voter is anonymous
 * @property User|null $user Optional. The user that changed the answer to the poll, if the voter isn't anonymous
 * @property int[] $option_ids 0-based identifiers of chosen answer options. May be empty if the vote was retracted.
 *
 * @method string pollId()
 * @method Chat|null voterChat()
 * @method User|null user()
 * @method int[] optionIds()
 *
 * @method static setPollId(string $pollId)
 * @method static setVoterChat(Chat|null $voterChat)
 * @method static setUser(User|null $user)
 * @method static setOptionIds(int[] $optionIds)
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
