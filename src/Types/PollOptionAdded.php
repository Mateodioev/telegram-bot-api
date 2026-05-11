<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Describes a service message about an option added to a poll.
 *
 * @property MaybeInaccessibleMessage|null $poll_message Optional. Message containing the poll to which the option was added, if known. Note that the Message object in this field will not contain the reply_to_message field even if it itself is a reply.
 * @property string $option_persistent_id Unique identifier of the added option
 * @property string $option_text Option text
 * @property MessageEntity[]|null $option_text_entities Optional. Special entities that appear in the option_text
 *
 * @method MaybeInaccessibleMessage|null pollMessage()
 * @method string optionPersistentId()
 * @method string optionText()
 * @method MessageEntity[]|null optionTextEntities()
 *
 * @method static setPollMessage(MaybeInaccessibleMessage|null $pollMessage)
 * @method static setOptionPersistentId(string $optionPersistentId)
 * @method static setOptionText(string $optionText)
 * @method static setOptionTextEntities(MessageEntity[]|null $optionTextEntities)
 *
 * @see https://core.telegram.org/bots/api#polloptionadded
 */
class PollOptionAdded extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'poll_message'         => FieldType::optional(MaybeInaccessibleMessage::class),
            'option_persistent_id' => FieldType::single('string'),
            'option_text'          => FieldType::single('string'),
            'option_text_entities' => new FieldType(MessageEntity::class, allowArrays: true, allowNull: true, subTypes: []),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
