<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * Represents the [scope](https://core.telegram.org/bots/api#botcommandscope) of bot commands, covering a specific member of a group or supergroup chat.
 * 
 * @property string         $type    Scope type, must be chat_member
 * @property integer|string $chat_id Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 * @property integer        $user_id Unique identifier of the target user
 * 
 * @method string         type()
 * @method integer|string chatId()
 * @method integer        userId()
 * 
 * @method static setType(string $type)
 * @method static setChatId(integer|string $chatId)
 * @method static setUserId(integer $userId)
 * 
 * @see https://core.telegram.org/bots/api#botcommandscopechatmember
 */
class BotCommandScopeChatMember extends BotCommandScope
{
    protected array $fields = [
        'type' => 'string',
        'chat_id' => 'integer|string',
        'user_id' => 'integer',
    ];
}
