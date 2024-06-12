<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object contains information about one answer option in a poll to send.
 *
 * @property string $text Option text, 1-100 characters
 * @property string|null $text_parse_mode Optional. Mode for parsing entities in the text. See formatting options for more details. Currently, only custom emoji entities are allowed
 * @property MessageEntity[]|null $text_entities Optional. A JSON-serialized list of special entities that appear in the poll option text. It can be specified instead of text_parse_mode
 *
 * @method string text()
 * @method string|null textParseMode()
 * @method MessageEntity[]|null textEntities()
 *
 * @method static setText(string $text)
 * @method static setTextParseMode(string|null $textParseMode)
 * @method static setTextEntities(MessageEntity[]|null $textEntities)
 *
 * @see https://core.telegram.org/bots/api#inputpolloption
 */
class InputPollOption extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'text'            => FieldType::single('string'),
            'text_parse_mode' => FieldType::optional('string'),
            'text_entities'   => new FieldType(MessageEntity::class, allowArrays: true, allowNull: true, subTypes: []),
        ];
    }
}
