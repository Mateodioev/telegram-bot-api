<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;
use Mateodioev\Bots\Telegram\Config\FieldsStorage;

/**
 * This object defines the criteria used to request a suitable chat. Information about the selected chat will be shared with the bot when the corresponding button is pressed. The bot will be granted requested rights in the chat if appropriate. More about requesting chats: https://core.telegram.org/bots/features#chat-and-user-selection.
 *
 * @property int $request_id Signed 32-bit identifier of the request, which will be received back in the ChatShared object. Must be unique within the message
 * @property bool $chat_is_channel Pass True to request a channel chat, pass False to request a group or a supergroup chat.
 * @property bool|null $chat_is_forum Optional. Pass True to request a forum supergroup, pass False to request a non-forum chat. If not specified, no additional restrictions are applied.
 * @property bool|null $chat_has_username Optional. Pass True to request a supergroup or a channel with a username, pass False to request a chat without a username. If not specified, no additional restrictions are applied.
 * @property bool|null $chat_is_created Optional. Pass True to request a chat owned by the user. Otherwise, no additional restrictions are applied.
 * @property ChatAdministratorRights|null $user_administrator_rights Optional. A JSON-serialized object listing the required administrator rights of the user in the chat. The rights must be a superset of bot_administrator_rights. If not specified, no additional restrictions are applied.
 * @property ChatAdministratorRights|null $bot_administrator_rights Optional. A JSON-serialized object listing the required administrator rights of the bot in the chat. The rights must be a subset of user_administrator_rights. If not specified, no additional restrictions are applied.
 * @property bool|null $bot_is_member Optional. Pass True to request a chat with the bot as a member. Otherwise, no additional restrictions are applied.
 * @property bool|null $request_title Optional. Pass True to request the chat's title
 * @property bool|null $request_username Optional. Pass True to request the chat's username
 * @property bool|null $request_photo Optional. Pass True to request the chat's photo
 *
 * @method int requestId()
 * @method bool chatIsChannel()
 * @method bool|null chatIsForum()
 * @method bool|null chatHasUsername()
 * @method bool|null chatIsCreated()
 * @method ChatAdministratorRights|null userAdministratorRights()
 * @method ChatAdministratorRights|null botAdministratorRights()
 * @method bool|null botIsMember()
 * @method bool|null requestTitle()
 * @method bool|null requestUsername()
 * @method bool|null requestPhoto()
 *
 * @method static setRequestId(int $requestId)
 * @method static setChatIsChannel(bool $chatIsChannel)
 * @method static setChatIsForum(bool|null $chatIsForum)
 * @method static setChatHasUsername(bool|null $chatHasUsername)
 * @method static setChatIsCreated(bool|null $chatIsCreated)
 * @method static setUserAdministratorRights(ChatAdministratorRights|null $userAdministratorRights)
 * @method static setBotAdministratorRights(ChatAdministratorRights|null $botAdministratorRights)
 * @method static setBotIsMember(bool|null $botIsMember)
 * @method static setRequestTitle(bool|null $requestTitle)
 * @method static setRequestUsername(bool|null $requestUsername)
 * @method static setRequestPhoto(bool|null $requestPhoto)
 *
 * @see https://core.telegram.org/bots/api#keyboardbuttonrequestchat
 */
class KeyboardButtonRequestChat extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'request_id'                => FieldType::single('integer'),
            'chat_is_channel'           => FieldType::single('boolean'),
            'chat_is_forum'             => FieldType::optional('boolean'),
            'chat_has_username'         => FieldType::optional('boolean'),
            'chat_is_created'           => FieldType::optional('boolean'),
            'user_administrator_rights' => FieldType::optional(ChatAdministratorRights::class),
            'bot_administrator_rights'  => FieldType::optional(ChatAdministratorRights::class),
            'bot_is_member'             => FieldType::optional('boolean'),
            'request_title'             => FieldType::optional('boolean'),
            'request_username'          => FieldType::optional('boolean'),
            'request_photo'             => FieldType::optional('boolean'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
