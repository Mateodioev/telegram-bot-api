<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object is received when messages are deleted from a connected business account.
 *
 * @property string $business_connection_id Unique identifier of the business connection
 * @property Chat $chat Information about a chat in the business account. The bot may not have access to the chat or the corresponding user.
 * @property int[] $message_ids The list of identifiers of deleted messages in the chat of the business account
 *
 * @method string businessConnectionId()
 * @method Chat chat()
 * @method int[] messageIds()
 *
 * @method static setBusinessConnectionId(string $businessConnectionId)
 * @method static setChat(Chat $chat)
 * @method static setMessageIds(int[] $messageIds)
 *
 * @see https://core.telegram.org/bots/api#businessmessagesdeleted
 */
class BusinessMessagesDeleted extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'business_connection_id' => FieldType::single('string'),
            'chat'                   => FieldType::single(Chat::class),
            'message_ids'            => FieldType::multiple('integer'),
        ];
    }
}
