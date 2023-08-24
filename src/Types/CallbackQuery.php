<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents an incoming callback query from a callback button in an inline keyboard. If the button that originated the query was attached to a message sent by the bot, the field message will be present. If the button was attached to a message sent via the bot (in inline mode), the field inline_message_id will be present. Exactly one of the fields data or game_short_name will be present.
 *
 * @see https://core.telegram.org/bots/api#callbackquery
 */
class CallbackQuery extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'id'                => FieldType::single('string'),
            'from'              => FieldType::single(User::class),
            'message'           => FieldType::optional(Message::class),
            'inline_message_id' => FieldType::optional('string'),
            'chat_instance'     => FieldType::single('string'),
            'data'              => FieldType::optional('string'),
            'game_short_name'   => FieldType::optional('string'),
        ];
    }
}
