<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Describes a task in a checklist.
 *
 * @property int $id Unique identifier of the task
 * @property string $text Text of the task
 * @property MessageEntity[]|null $text_entities Optional. Special entities that appear in the task text
 * @property User|null $completed_by_user Optional. User that completed the task; omitted if the task wasn't completed
 * @property int|null $completion_date Optional. Point in time (Unix timestamp) when the task was completed; 0 if the task wasn't completed
 *
 * @method int id()
 * @method string text()
 * @method MessageEntity[]|null textEntities()
 * @method User|null completedByUser()
 * @method int|null completionDate()
 *
 * @method static setId(int $id)
 * @method static setText(string $text)
 * @method static setTextEntities(MessageEntity[]|null $textEntities)
 * @method static setCompletedByUser(User|null $completedByUser)
 * @method static setCompletionDate(int|null $completionDate)
 *
 * @see https://core.telegram.org/bots/api#checklisttask
 */
class ChecklistTask extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'id'                => FieldType::single('integer'),
            'text'              => FieldType::single('string'),
            'text_entities'     => new FieldType(MessageEntity::class, allowArrays: true, allowNull: true, subTypes: []),
            'completed_by_user' => FieldType::optional(User::class),
            'completion_date'   => FieldType::optional('integer'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
