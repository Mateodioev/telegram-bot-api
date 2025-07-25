<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Describes a transaction with a chat.
 *
 * @property string $type Type of the transaction partner, always "chat"
 * @property Chat $chat Information about the chat
 * @property Gift|null $gift Optional. The gift sent to the chat by the bot
 *
 * @method string type()
 * @method Chat chat()
 * @method Gift|null gift()
 *
 * @method static setType(string $type)
 * @method static setChat(Chat $chat)
 * @method static setGift(Gift|null $gift)
 *
 * @see https://core.telegram.org/bots/api#transactionpartnerchat
 */
class TransactionPartnerChat extends TransactionPartner
{
    protected function boot(): void
    {
        $this->fields = [
            'type' => FieldType::single('string'),
            'chat' => FieldType::single(Chat::class),
            'gift' => FieldType::optional(Gift::class),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }

    public static function default(): static
    {
        return (new static())->setType('chat');
    }
}
