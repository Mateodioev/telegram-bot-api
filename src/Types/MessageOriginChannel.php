<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * The message was originally sent to a channel chat.
 *
 * @property string $type Type of the message origin, always "channel"
 * @property int $date Date the message was sent originally in Unix time
 * @property Chat $chat Channel chat to which the message was originally sent
 * @property int $message_id Unique message identifier inside the chat
 * @property string|null $author_signature Optional. Signature of the original post author
 *
 * @method string type()
 * @method int date()
 * @method Chat chat()
 * @method int messageId()
 * @method string|null authorSignature()
 *
 * @method static setType(string $type)
 * @method static setDate(int $date)
 * @method static setChat(Chat $chat)
 * @method static setMessageId(int $messageId)
 * @method static setAuthorSignature(string|null $authorSignature)
 *
 * @see https://core.telegram.org/bots/api#messageoriginchannel
 */
class MessageOriginChannel extends MessageOrigin
{
    public const TYPE = 'channel';

    public function __construct(
        int $date,
        Chat $chat,
        int $message_id,
        string $type = self::TYPE,
        ?string $author_signature = null,
    ) {
        parent::__construct([
            'type'             => $type,
            'date'             => $date,
            'chat'             => $chat,
            'message_id'       => $message_id,
            'author_signature' => $author_signature,
        ]);
    }

    protected function boot(): void
    {
        $this->fields = [
            'type'             => FieldType::single('string'),
            'date'             => FieldType::single('integer'),
            'chat'             => FieldType::single(Chat::class),
            'message_id'       => FieldType::single('integer'),
            'author_signature' => FieldType::optional('string'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
