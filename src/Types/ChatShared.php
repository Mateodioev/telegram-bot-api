<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object contains information about the chat whose identifier was shared with the bot using a KeyboardButtonRequestChat button.
 *
 * @see https://core.telegram.org/bots/api#chatshared
 */
class ChatShared extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'request_id' => FieldType::single('integer'),
            'chat_id'    => FieldType::single('integer'),
        ];
    }
}
