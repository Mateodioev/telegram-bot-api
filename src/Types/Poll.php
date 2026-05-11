<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * This object contains information about a poll.
 *
 * @property string $id Unique poll identifier
 * @property string $question Poll question, 1-300 characters
 * @property MessageEntity[]|null $question_entities Optional. Special entities that appear in the question. Currently, only custom emoji entities are allowed in poll questions
 * @property PollOption[] $options List of poll options
 * @property int $total_voter_count Total number of users that voted in the poll
 * @property bool $is_closed True, if the poll is closed
 * @property bool $is_anonymous True, if the poll is anonymous
 * @property string $type Poll type, currently can be "regular" or "quiz"
 * @property bool $allows_multiple_answers True, if the poll allows multiple answers
 * @property bool $allows_revoting True, if the poll allows to change the chosen answer options
 * @property bool $members_only True if voting is limited to users who have been members of the chat where the poll was originally sent for more than 24 hours
 * @property string[]|null $country_codes Optional. A list of two-letter ISO 3166-1 alpha-2 country codes indicating the countries from which users can vote in the poll. If omitted, then users from any country can participate in the poll.
 * @property int[]|null $correct_option_ids Optional. Array of 0-based identifiers of the correct answer options. Available only for polls in quiz mode which are closed or were sent (not forwarded) by the bot or to the private chat with the bot.
 * @property string|null $explanation Optional. Text that is shown when a user chooses an incorrect answer or taps on the lamp icon in a quiz-style poll, 0-200 characters
 * @property MessageEntity[]|null $explanation_entities Optional. Special entities like usernames, URLs, bot commands, etc. that appear in the explanation
 * @property PollMedia|null $explanation_media Optional. Media added to the quiz explanation
 * @property int|null $open_period Optional. Amount of time in seconds the poll will be active after creation
 * @property int|null $close_date Optional. Point in time (Unix timestamp) when the poll will be automatically closed
 * @property string|null $description Optional. Description of the poll; for polls inside the Message object only
 * @property MessageEntity[]|null $description_entities Optional. Special entities like usernames, URLs, bot commands, etc. that appear in the description
 * @property PollMedia|null $media Optional. Media added to the poll description; for polls inside the Message object only
 *
 * @method string id()
 * @method string question()
 * @method MessageEntity[]|null questionEntities()
 * @method PollOption[] options()
 * @method int totalVoterCount()
 * @method bool isClosed()
 * @method bool isAnonymous()
 * @method string type()
 * @method bool allowsMultipleAnswers()
 * @method bool allowsRevoting()
 * @method bool membersOnly()
 * @method string[]|null countryCodes()
 * @method int[]|null correctOptionIds()
 * @method string|null explanation()
 * @method MessageEntity[]|null explanationEntities()
 * @method PollMedia|null explanationMedia()
 * @method int|null openPeriod()
 * @method int|null closeDate()
 * @method string|null description()
 * @method MessageEntity[]|null descriptionEntities()
 * @method PollMedia|null media()
 *
 * @method static setId(string $id)
 * @method static setQuestion(string $question)
 * @method static setQuestionEntities(MessageEntity[]|null $questionEntities)
 * @method static setOptions(PollOption[] $options)
 * @method static setTotalVoterCount(int $totalVoterCount)
 * @method static setIsClosed(bool $isClosed)
 * @method static setIsAnonymous(bool $isAnonymous)
 * @method static setType(string $type)
 * @method static setAllowsMultipleAnswers(bool $allowsMultipleAnswers)
 * @method static setAllowsRevoting(bool $allowsRevoting)
 * @method static setMembersOnly(bool $membersOnly)
 * @method static setCountryCodes(string[]|null $countryCodes)
 * @method static setCorrectOptionIds(int[]|null $correctOptionIds)
 * @method static setExplanation(string|null $explanation)
 * @method static setExplanationEntities(MessageEntity[]|null $explanationEntities)
 * @method static setExplanationMedia(PollMedia|null $explanationMedia)
 * @method static setOpenPeriod(int|null $openPeriod)
 * @method static setCloseDate(int|null $closeDate)
 * @method static setDescription(string|null $description)
 * @method static setDescriptionEntities(MessageEntity[]|null $descriptionEntities)
 * @method static setMedia(PollMedia|null $media)
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
            'question_entities'       => new FieldType(MessageEntity::class, allowArrays: true, allowNull: true, subTypes: []),
            'options'                 => FieldType::array(PollOption::class),
            'total_voter_count'       => FieldType::single('integer'),
            'is_closed'               => FieldType::single('boolean'),
            'is_anonymous'            => FieldType::single('boolean'),
            'type'                    => FieldType::single('string'),
            'allows_multiple_answers' => FieldType::single('boolean'),
            'allows_revoting'         => FieldType::single('boolean'),
            'members_only'            => FieldType::single('boolean'),
            'country_codes'           => new FieldType('string', allowArrays: true, allowNull: true, subTypes: []),
            'correct_option_ids'      => new FieldType('integer', allowArrays: true, allowNull: true, subTypes: []),
            'explanation'             => FieldType::optional('string'),
            'explanation_entities'    => new FieldType(MessageEntity::class, allowArrays: true, allowNull: true, subTypes: []),
            'explanation_media'       => FieldType::optional(PollMedia::class),
            'open_period'             => FieldType::optional('integer'),
            'close_date'              => FieldType::optional('integer'),
            'description'             => FieldType::optional('string'),
            'description_entities'    => new FieldType(MessageEntity::class, allowArrays: true, allowNull: true, subTypes: []),
            'media'                   => FieldType::optional(PollMedia::class),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
