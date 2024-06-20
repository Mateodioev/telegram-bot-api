<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object contains information about the quoted part of a message that is replied to by the given message.
 *
 * @property string $text Text of the quoted part of a message that is replied to by the given message
 * @property MessageEntity[]|null $entities Optional. Special entities that appear in the quote. Currently, only bold, italic, underline, strikethrough, spoiler, and custom_emoji entities are kept in quotes.
 * @property int $position Approximate quote position in the original message in UTF-16 code units as specified by the sender
 * @property bool|null $is_manual Optional. True, if the quote was chosen manually by the message sender. Otherwise, the quote was added automatically by the server.
 *
 * @method string text()
 * @method MessageEntity[]|null entities()
 * @method int position()
 * @method bool|null isManual()
 *
 * @method static setText(string $text)
 * @method static setEntities(MessageEntity[]|null $entities)
 * @method static setPosition(int $position)
 * @method static setIsManual(bool|null $isManual)
 *
 * @see https://core.telegram.org/bots/api#textquote
 */
class TextQuote extends abstractType
{
    protected function boot(): void
    {
        if ($this->fields !== null) {
            // Already booted
            return;
        }
        $this->fields = [
            'text'      => FieldType::single('string'),
            'entities'  => new FieldType(MessageEntity::class, allowArrays: true, allowNull: true, subTypes: []),
            'position'  => FieldType::single('integer'),
            'is_manual' => FieldType::optional('boolean'),
        ];
    }
}
