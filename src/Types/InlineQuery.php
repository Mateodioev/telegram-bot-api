<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents an incoming inline query. When the user sends an empty query, your bot could return some default or trending results.
 *
 * @property string $id Unique identifier for this query
 * @property User $from Sender
 * @property string $query Text of the query (up to 256 characters)
 * @property string $offset Offset of the results to be returned, can be controlled by the bot
 * @property ?string $chat_type Optional. Type of the chat from which the inline query was sent. Can be either "sender" for a private chat with the inline query sender, "private", "group", "supergroup", or "channel". The chat type should be always known for requests sent from official clients and most third-party clients, unless the request was sent from a secret chat
 * @property ?Location $location Optional. Sender location, only for bots that request user location
 *
 * @method string id()
 * @method User from()
 * @method string query()
 * @method string offset()
 * @method ?string chatType()
 * @method ?Location location()
 *
 * @method static setId(string $id)
 * @method static setFrom(User $from)
 * @method static setQuery(string $query)
 * @method static setOffset(string $offset)
 * @method static setChatType(?string $chatType)
 * @method static setLocation(?Location $location)
 *
 * @see https://core.telegram.org/bots/api#inlinequery
 */
class InlineQuery extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'id'        => FieldType::single('string'),
            'from'      => FieldType::single(User::class),
            'query'     => FieldType::single('string'),
            'offset'    => FieldType::single('string'),
            'chat_type' => FieldType::optional('string'),
            'location'  => FieldType::optional(Location::class),
        ];
    }
}
