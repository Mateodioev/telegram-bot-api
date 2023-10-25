<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents an incoming callback query from a callback button in an inline keyboard. If the button that originated the query was attached to a message sent by the bot, the field message will be present. If the button was attached to a message sent via the bot (in inline mode), the field inline_message_id will be present. Exactly one of the fields data or game_short_name will be present.
 *
 * @property string $id Unique identifier for this query
 * @property User $from Sender
 * @property Message|null $message Optional. Message with the callback button that originated the query. Note that message content and message date will not be available if the message is too old
 * @property string|null $inline_message_id Optional. Identifier of the message sent via the bot in inline mode, that originated the query.
 * @property string $chat_instance Global identifier, uniquely corresponding to the chat to which the message with the callback button was sent. Useful for high scores in games.
 * @property string|null $data Optional. Data associated with the callback button. Be aware that the message originated the query can contain no callback buttons with this data.
 * @property string|null $game_short_name Optional. Short name of a Game to be returned, serves as the unique identifier for the game
 *
 * @method string id()
 * @method User from()
 * @method Message|null message()
 * @method string|null inlineMessageId()
 * @method string chatInstance()
 * @method string|null data()
 * @method string|null gameShortName()
 *
 * @method static setId(string $id)
 * @method static setFrom(User $from)
 * @method static setMessage(Message|null $message)
 * @method static setInlineMessageId(string|null $inlineMessageId)
 * @method static setChatInstance(string $chatInstance)
 * @method static setData(string|null $data)
 * @method static setGameShortName(string|null $gameShortName)
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
