<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Describes a service message about tasks added to a checklist.
 *
 * @property Message|null $checklist_message Optional. Message containing the checklist to which the tasks were added. Note that the Message object in this field will not contain the reply_to_message field even if it itself is a reply.
 * @property ChecklistTask[] $tasks List of tasks added to the checklist
 *
 * @method Message|null checklistMessage()
 * @method ChecklistTask[] tasks()
 *
 * @method static setChecklistMessage(Message|null $checklistMessage)
 * @method static setTasks(ChecklistTask[] $tasks)
 *
 * @see https://core.telegram.org/bots/api#checklisttasksadded
 */
class ChecklistTasksAdded extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'checklist_message' => FieldType::optional(Message::class),
            'tasks'             => FieldType::array(ChecklistTask::class),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
