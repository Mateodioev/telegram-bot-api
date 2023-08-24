<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object contains information about a poll.
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
