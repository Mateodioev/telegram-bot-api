<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

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
    public function __construct(
        string $poll_id,
        ?Chat $voter_chat = null,
        ?User $user = null,
        array $option_ids = [],
    ) {
        parent::__construct([
            'poll_id'    => $poll_id,
            'voter_chat' => $voter_chat,
            'user'       => $user,
            'option_ids' => $option_ids,
        ]);
    }

    protected function boot(): void
    {
        $this->fields = [
            'poll_id'    => FieldType::single('string'),
            'voter_chat' => FieldType::optional(Chat::class),
            'user'       => FieldType::optional(User::class),
            'option_ids' => FieldType::multiple('integer'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
