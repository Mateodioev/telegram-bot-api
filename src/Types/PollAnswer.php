<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * This object represents an answer of a user in a non-anonymous poll.
 * 
 * @property string    $poll_id    Unique poll identifier
 * @property User      $user       The user, who changed the answer to the poll
 * @property integer[] $option_ids 0-based identifiers of answer options, chosen by the user. May be empty if the user retracted their vote.
 * 
 * @method string    pollId()
 * @method User      user()
 * @method integer[] optionIds()
 * 
 * @method static setPollId(string $pollId)
 * @method static setUser(User $user)
 * @method static setOptionIds(integer[] $optionIds)
 * 
 * @see https://core.telegram.org/bots/api#pollanswer
 */
class PollAnswer extends baseType
{
    protected array $fields = [
        'poll_id'    => 'string',
        'user'       => User::class,
        'option_ids' => 'array',
    ];
}
