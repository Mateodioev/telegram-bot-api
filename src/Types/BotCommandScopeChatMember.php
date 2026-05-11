<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Represents the scope of bot commands, covering a specific member of a group or supergroup chat.
 *
 * @property string $type Scope type, must be chat_member
 * @property int|string $chat_id Unique identifier for the target chat or username of the target supergroup in the format @username. Channel direct messages chats and channel chats aren't supported.
 * @property int $user_id Unique identifier of the target user
 *
 * @method string type()
 * @method int|string chatId()
 * @method int userId()
 *
 * @method static setType(string $type)
 * @method static setChatId(int|string $chatId)
 * @method static setUserId(int $userId)
 *
 * @see https://core.telegram.org/bots/api#botcommandscopechatmember
 */
class BotCommandScopeChatMember extends BotCommandScope
{
    protected function boot(): void
    {
        $this->fields = [
            'type'    => FieldType::single('string'),
            'chat_id' => new FieldType('string', allowArrays: false, allowNull: false, subTypes: ['integer']),
            'user_id' => FieldType::single('integer'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }

    public static function default(): static
    {
        return (new static())
            ->setType('chat_member');
    }
}
