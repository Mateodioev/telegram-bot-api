<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object contains information about the chat whose identifier was shared with the bot using a KeyboardButtonRequestChat button.
 *
 * @property int $request_id Identifier of the request
 * @property int $chat_id Identifier of the shared chat. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a 64-bit integer or double-precision float type are safe for storing this identifier. The bot may not have access to the chat and could be unable to use this identifier, unless the chat is already known to the bot by some other means.
 *
 * @method int requestId()
 * @method int chatId()
 *
 * @method static setRequestId(int $requestId)
 * @method static setChatId(int $chatId)
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
