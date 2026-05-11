<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * This object contains information about one answer option in a poll.
 *
 * @property string $persistent_id Unique identifier of the option, persistent on option addition and deletion
 * @property string $text Option text, 1-100 characters
 * @property MessageEntity[]|null $text_entities Optional. Special entities that appear in the option text. Currently, only custom emoji entities are allowed in poll option texts
 * @property PollMedia|null $media Optional. Media added to the poll option
 * @property int $voter_count Number of users who voted for this option; may be 0 if unknown
 * @property User|null $added_by_user Optional. User who added the option; omitted if the option wasn't added by a user after poll creation
 * @property Chat|null $added_by_chat Optional. Chat that added the option; omitted if the option wasn't added by a chat after poll creation
 * @property int|null $addition_date Optional. Point in time (Unix timestamp) when the option was added; omitted if the option existed in the original poll
 *
 * @method string persistentId()
 * @method string text()
 * @method MessageEntity[]|null textEntities()
 * @method PollMedia|null media()
 * @method int voterCount()
 * @method User|null addedByUser()
 * @method Chat|null addedByChat()
 * @method int|null additionDate()
 *
 * @method static setPersistentId(string $persistentId)
 * @method static setText(string $text)
 * @method static setTextEntities(MessageEntity[]|null $textEntities)
 * @method static setMedia(PollMedia|null $media)
 * @method static setVoterCount(int $voterCount)
 * @method static setAddedByUser(User|null $addedByUser)
 * @method static setAddedByChat(Chat|null $addedByChat)
 * @method static setAdditionDate(int|null $additionDate)
 *
 * @see https://core.telegram.org/bots/api#polloption
 */
class PollOption extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'persistent_id' => FieldType::single('string'),
            'text'          => FieldType::single('string'),
            'text_entities' => new FieldType(MessageEntity::class, allowArrays: true, allowNull: true, subTypes: []),
            'media'         => FieldType::optional(PollMedia::class),
            'voter_count'   => FieldType::single('integer'),
            'added_by_user' => FieldType::optional(User::class),
            'added_by_chat' => FieldType::optional(Chat::class),
            'addition_date' => FieldType::optional('integer'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
