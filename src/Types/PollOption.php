<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * This object contains information about one answer option in a poll.
 *
 * @property string $text Option text, 1-100 characters
 * @property MessageEntity[]|null $text_entities Optional. Special entities that appear in the option text. Currently, only custom emoji entities are allowed in poll option texts
 * @property int $voter_count Number of users that voted for this option
 *
 * @method string text()
 * @method MessageEntity[]|null textEntities()
 * @method int voterCount()
 *
 * @method static setText(string $text)
 * @method static setTextEntities(MessageEntity[]|null $textEntities)
 * @method static setVoterCount(int $voterCount)
 *
 * @see https://core.telegram.org/bots/api#polloption
 */
class PollOption extends abstractType
{
    public function __construct(
        string $text,
        ?array $text_entities = null,
        int $voter_count,
    ) {
        parent::__construct([
            'text'          => $text,
            'text_entities' => $text_entities,
            'voter_count'   => $voter_count,
        ]);
    }

    protected function boot(): void
    {
        $this->fields = [
            'text'          => FieldType::single('string'),
            'text_entities' => new FieldType(MessageEntity::class, allowArrays: true, allowNull: true, subTypes: []),
            'voter_count'   => FieldType::single('integer'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
