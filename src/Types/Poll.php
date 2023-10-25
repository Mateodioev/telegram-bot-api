<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object contains information about a poll.
 *
 * @property string $id Unique poll identifier
 * @property string $question Poll question, 1-300 characters
 * @property PollOption[] $options List of poll options
 * @property int $total_voter_count Total number of users that voted in the poll
 * @property bool $is_closed True, if the poll is closed
 * @property bool $is_anonymous True, if the poll is anonymous
 * @property string $type Poll type, currently can be "regular" or "quiz"
 * @property bool $allows_multiple_answers True, if the poll allows multiple answers
 * @property int|null $correct_option_id Optional. 0-based identifier of the correct answer option. Available only for polls in the quiz mode, which are closed, or was sent (not forwarded) by the bot or to the private chat with the bot.
 * @property string|null $explanation Optional. Text that is shown when a user chooses an incorrect answer or taps on the lamp icon in a quiz-style poll, 0-200 characters
 * @property MessageEntity[]|null $explanation_entities Optional. Special entities like usernames, URLs, bot commands, etc. that appear in the explanation
 * @property int|null $open_period Optional. Amount of time in seconds the poll will be active after creation
 * @property int|null $close_date Optional. Point in time (Unix timestamp) when the poll will be automatically closed
 *
 * @method string id()
 * @method string question()
 * @method PollOption[] options()
 * @method int totalVoterCount()
 * @method bool isClosed()
 * @method bool isAnonymous()
 * @method string type()
 * @method bool allowsMultipleAnswers()
 * @method int|null correctOptionId()
 * @method string|null explanation()
 * @method MessageEntity[]|null explanationEntities()
 * @method int|null openPeriod()
 * @method int|null closeDate()
 *
 * @method static setId(string $id)
 * @method static setQuestion(string $question)
 * @method static setOptions(PollOption[] $options)
 * @method static setTotalVoterCount(int $totalVoterCount)
 * @method static setIsClosed(bool $isClosed)
 * @method static setIsAnonymous(bool $isAnonymous)
 * @method static setType(string $type)
 * @method static setAllowsMultipleAnswers(bool $allowsMultipleAnswers)
 * @method static setCorrectOptionId(int|null $correctOptionId)
 * @method static setExplanation(string|null $explanation)
 * @method static setExplanationEntities(MessageEntity[]|null $explanationEntities)
 * @method static setOpenPeriod(int|null $openPeriod)
 * @method static setCloseDate(int|null $closeDate)
 *
 * @see https://core.telegram.org/bots/api#poll
 */
class Poll extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'id'                      => FieldType::single('string'),
            'question'                => FieldType::single('string'),
            'options'                 => FieldType::multiple(PollOption::class),
            'total_voter_count'       => FieldType::single('integer'),
            'is_closed'               => FieldType::single('boolean'),
            'is_anonymous'            => FieldType::single('boolean'),
            'type'                    => FieldType::single('string'),
            'allows_multiple_answers' => FieldType::single('boolean'),
            'correct_option_id'       => FieldType::optional('integer'),
            'explanation'             => FieldType::optional('string'),
            'explanation_entities'    => new FieldType(MessageEntity::class, allowArrays: true, allowNull: true, subTypes: []),
            'open_period'             => FieldType::optional('integer'),
            'close_date'              => FieldType::optional('integer'),
        ];
    }
}
