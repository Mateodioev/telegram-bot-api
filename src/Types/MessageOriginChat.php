<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * The message was originally sent on behalf of a chat to a group chat.
 *
 * @property string $type Type of the message origin, always "chat"
 * @property int $date Date the message was sent originally in Unix time
 * @property Chat $sender_chat Chat that sent the message originally
 * @property string|null $author_signature Optional. For messages originally sent by an anonymous chat administrator, original message author signature
 *
 * @method string type()
 * @method int date()
 * @method Chat senderChat()
 * @method string|null authorSignature()
 *
 * @method static setType(string $type)
 * @method static setDate(int $date)
 * @method static setSenderChat(Chat $senderChat)
 * @method static setAuthorSignature(string|null $authorSignature)
 *
 * @see https://core.telegram.org/bots/api#messageoriginchat
 */
class MessageOriginChat extends MessageOrigin
{
    protected function boot(): void
    {
        $this->fields = [
            'type'             => FieldType::single('string'),
            'date'             => FieldType::single('integer'),
            'sender_chat'      => FieldType::single(Chat::class),
            'author_signature' => FieldType::optional('string'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }

    public static function default(): static
    {
        return (new static())
            ->setType('chat');
    }
}
