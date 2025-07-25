<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Describes a service message about checklist tasks marked as done or not done.
 *
 * @property Message|null $checklist_message Optional. Message containing the checklist whose tasks were marked as done or not done. Note that the Message object in this field will not contain the reply_to_message field even if it itself is a reply.
 * @property int[]|null $marked_as_done_task_ids Optional. Identifiers of the tasks that were marked as done
 * @property int[]|null $marked_as_not_done_task_ids Optional. Identifiers of the tasks that were marked as not done
 *
 * @method Message|null checklistMessage()
 * @method int[]|null markedAsDoneTaskIds()
 * @method int[]|null markedAsNotDoneTaskIds()
 *
 * @method static setChecklistMessage(Message|null $checklistMessage)
 * @method static setMarkedAsDoneTaskIds(int[]|null $markedAsDoneTaskIds)
 * @method static setMarkedAsNotDoneTaskIds(int[]|null $markedAsNotDoneTaskIds)
 *
 * @see https://core.telegram.org/bots/api#checklisttasksdone
 */
class ChecklistTasksDone extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'checklist_message'           => FieldType::optional(Message::class),
            'marked_as_done_task_ids'     => new FieldType('integer', allowArrays: true, allowNull: true, subTypes: []),
            'marked_as_not_done_task_ids' => new FieldType('integer', allowArrays: true, allowNull: true, subTypes: []),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
