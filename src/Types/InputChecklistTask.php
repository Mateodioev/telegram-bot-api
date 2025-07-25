<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Describes a task to add to a checklist.
 *
 * @property int $id Unique identifier of the task; must be positive and unique among all task identifiers currently present in the checklist
 * @property string $text Text of the task; 1-100 characters after entities parsing
 * @property string|null $parse_mode Optional. Mode for parsing entities in the text. See formatting options for more details.
 * @property MessageEntity[]|null $text_entities Optional. List of special entities that appear in the text, which can be specified instead of parse_mode. Currently, only bold, italic, underline, strikethrough, spoiler, and custom_emoji entities are allowed.
 *
 * @method int id()
 * @method string text()
 * @method string|null parseMode()
 * @method MessageEntity[]|null textEntities()
 *
 * @method static setId(int $id)
 * @method static setText(string $text)
 * @method static setParseMode(string|null $parseMode)
 * @method static setTextEntities(MessageEntity[]|null $textEntities)
 *
 * @see https://core.telegram.org/bots/api#inputchecklisttask
 */
class InputChecklistTask extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'id'            => FieldType::single('integer'),
            'text'          => FieldType::single('string'),
            'parse_mode'    => FieldType::optional('string'),
            'text_entities' => new FieldType(MessageEntity::class, allowArrays: true, allowNull: true, subTypes: []),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
