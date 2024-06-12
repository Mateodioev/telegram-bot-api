<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents a chat.
 *
 * @property int $id Unique identifier for this chat. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing this identifier.
 * @property string $type Type of the chat, can be either "private", "group", "supergroup" or "channel"
 * @property string|null $title Optional. Title, for supergroups, channels and group chats
 * @property string|null $username Optional. Username, for private chats, supergroups and channels if available
 * @property string|null $first_name Optional. First name of the other party in a private chat
 * @property string|null $last_name Optional. Last name of the other party in a private chat
 * @property bool|null $is_forum Optional. True, if the supergroup chat is a forum (has topics enabled)
 *
 * @method int id()
 * @method string type()
 * @method string|null title()
 * @method string|null username()
 * @method string|null firstName()
 * @method string|null lastName()
 * @method bool|null isForum()
 *
 * @method static setId(int $id)
 * @method static setType(string $type)
 * @method static setTitle(string|null $title)
 * @method static setUsername(string|null $username)
 * @method static setFirstName(string|null $firstName)
 * @method static setLastName(string|null $lastName)
 * @method static setIsForum(bool|null $isForum)
 *
 * @see https://core.telegram.org/bots/api#chat
 */
class Chat extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'id'         => FieldType::single('integer'),
            'type'       => FieldType::single('string'),
            'title'      => FieldType::optional('string'),
            'username'   => FieldType::optional('string'),
            'first_name' => FieldType::optional('string'),
            'last_name'  => FieldType::optional('string'),
            'is_forum'   => FieldType::optional('boolean'),
        ];
    }
}
