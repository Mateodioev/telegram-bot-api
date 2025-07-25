<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Describes a checklist.
 *
 * @property string $title Title of the checklist
 * @property MessageEntity[]|null $title_entities Optional. Special entities that appear in the checklist title
 * @property ChecklistTask[] $tasks List of tasks in the checklist
 * @property bool|null $others_can_add_tasks Optional. True, if users other than the creator of the list can add tasks to the list
 * @property bool|null $others_can_mark_tasks_as_done Optional. True, if users other than the creator of the list can mark tasks as done or not done
 *
 * @method string title()
 * @method MessageEntity[]|null titleEntities()
 * @method ChecklistTask[] tasks()
 * @method bool|null othersCanAddTasks()
 * @method bool|null othersCanMarkTasksAsDone()
 *
 * @method static setTitle(string $title)
 * @method static setTitleEntities(MessageEntity[]|null $titleEntities)
 * @method static setTasks(ChecklistTask[] $tasks)
 * @method static setOthersCanAddTasks(bool|null $othersCanAddTasks)
 * @method static setOthersCanMarkTasksAsDone(bool|null $othersCanMarkTasksAsDone)
 *
 * @see https://core.telegram.org/bots/api#checklist
 */
class Checklist extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'title'                         => FieldType::single('string'),
            'title_entities'                => new FieldType(MessageEntity::class, allowArrays: true, allowNull: true, subTypes: []),
            'tasks'                         => FieldType::array(ChecklistTask::class),
            'others_can_add_tasks'          => FieldType::optional('boolean'),
            'others_can_mark_tasks_as_done' => FieldType::optional('boolean'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
