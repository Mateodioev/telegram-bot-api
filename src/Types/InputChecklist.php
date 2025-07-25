<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Describes a checklist to create.
 *
 * @property string $title Title of the checklist; 1-255 characters after entities parsing
 * @property string|null $parse_mode Optional. Mode for parsing entities in the title. See formatting options for more details.
 * @property MessageEntity[]|null $title_entities Optional. List of special entities that appear in the title, which can be specified instead of parse_mode. Currently, only bold, italic, underline, strikethrough, spoiler, and custom_emoji entities are allowed.
 * @property InputChecklistTask[] $tasks List of 1-30 tasks in the checklist
 * @property bool|null $others_can_add_tasks Optional. Pass True if other users can add tasks to the checklist
 * @property bool|null $others_can_mark_tasks_as_done Optional. Pass True if other users can mark tasks as done or not done in the checklist
 *
 * @method string title()
 * @method string|null parseMode()
 * @method MessageEntity[]|null titleEntities()
 * @method InputChecklistTask[] tasks()
 * @method bool|null othersCanAddTasks()
 * @method bool|null othersCanMarkTasksAsDone()
 *
 * @method static setTitle(string $title)
 * @method static setParseMode(string|null $parseMode)
 * @method static setTitleEntities(MessageEntity[]|null $titleEntities)
 * @method static setTasks(InputChecklistTask[] $tasks)
 * @method static setOthersCanAddTasks(bool|null $othersCanAddTasks)
 * @method static setOthersCanMarkTasksAsDone(bool|null $othersCanMarkTasksAsDone)
 *
 * @see https://core.telegram.org/bots/api#inputchecklist
 */
class InputChecklist extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'title'                         => FieldType::single('string'),
            'parse_mode'                    => FieldType::optional('string'),
            'title_entities'                => new FieldType(MessageEntity::class, allowArrays: true, allowNull: true, subTypes: []),
            'tasks'                         => FieldType::array(InputChecklistTask::class),
            'others_can_add_tasks'          => FieldType::optional('boolean'),
            'others_can_mark_tasks_as_done' => FieldType::optional('boolean'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
