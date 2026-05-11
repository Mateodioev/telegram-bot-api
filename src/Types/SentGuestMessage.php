<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Describes an inline message sent by a guest bot.
 *
 * @property string $inline_message_id Identifier of the sent inline message
 *
 * @method string inlineMessageId()
 *
 * @method static setInlineMessageId(string $inlineMessageId)
 *
 * @see https://core.telegram.org/bots/api#sentguestmessage
 */
class SentGuestMessage extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'inline_message_id' => FieldType::single('string'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
