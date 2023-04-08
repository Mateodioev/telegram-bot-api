<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * This object defines the criteria used to request a suitable chat. The identifier of the selected chat will be shared with the bot when the corresponding button is pressed.
 * 
 * @property integer                  $request_id                Signed 32-bit identifier of the request, which will be received back in the [ChatShared](https://core.telegram.org/bots/api#chatshared) object. Must be unique within the message
 * @property boolean                  $chat_is_channel           Pass True to request a channel chat, pass False to request a group or a supergroup chat.
 * @property ?boolean                 $chat_is_forum             Optional. Pass True to request a forum supergroup, pass False to request a non-forum chat. If not specified, no additional restrictions are applied.
 * @property ?boolean                 $chat_has_username         Optional. Pass True to request a supergroup or a channel with a username, pass False to request a chat without a username. If not specified, no additional restrictions are applied.
 * @property ?boolean                 $chat_is_created           Optional. Pass True to request a chat owned by the user. Otherwise, no additional restrictions are applied.
 * @property ?ChatAdministratorRights $user_administrator_rights Optional. A JSON-serialized object listing the required administrator rights of the user in the chat. The rights must be a superset of bot_administrator_rights. If not specified, no additional restrictions are applied.
 * @property ?ChatAdministratorRights $bot_administrator_rights  Optional. A JSON-serialized object listing the required administrator rights of the bot in the chat. The rights must be a subset of user_administrator_rights. If not specified, no additional restrictions are applied.
 * @property ?boolean                 $bot_is_member             Optional. Pass True to request a chat with the bot as a member. Otherwise, no additional restrictions are applied.
 * 
 * @method integer                  requestId()
 * @method boolean                  chatIsChannel()
 * @method ?boolean                 chatIsForum()
 * @method ?boolean                 chatHasUsername()
 * @method ?boolean                 chatIsCreated()
 * @method ?ChatAdministratorRights userAdministratorRights()
 * @method ?ChatAdministratorRights botAdministratorRights()
 * @method ?boolean                 botIsMember()
 * 
 * @method static setRequestId(integer $requestId)
 * @method static setChatIsChannel(boolean $chatIsChannel)
 * @method static setChatIsForum(boolean $chatIsForum)
 * @method static setChatHasUsername(boolean $chatHasUsername)
 * @method static setChatIsCreated(boolean $chatIsCreated)
 * @method static setUserAdministratorRights(ChatAdministratorRights $userAdministratorRights)
 * @method static setBotAdministratorRights(ChatAdministratorRights $botAdministratorRights)
 * @method static setBotIsMember(boolean $botIsMember)
 * 
 * @see https://core.telegram.org/bots/api#keyboardbuttonrequestchat
 */
class KeyboardButtonRequestChat extends baseType
{
    protected array $fields = [
        'request_id'                => 'integer',
        'chat_is_channel'           => 'boolean',
        'chat_is_forum'             => 'boolean',
        'chat_has_username'         => 'boolean',
        'chat_is_created'           => 'boolean',
        'user_administrator_rights' => ChatAdministratorRights::class,
        'bot_administrator_rights'  => ChatAdministratorRights::class,
        'bot_is_member'             => 'boolean',
    ];
}
