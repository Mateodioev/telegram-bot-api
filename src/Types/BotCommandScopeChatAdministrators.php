<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Represents the scope of bot commands, covering all administrators of a specific group or supergroup chat.
 *
 * @property string $type Scope type, must be chat_administrators
 * @property int|string $chat_id Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 *
 * @method string type()
 * @method int|string chatId()
 *
 * @method static setType(string $type)
 * @method static setChatId(int|string $chatId)
 *
 * @see https://core.telegram.org/bots/api#botcommandscopechatadministrators
 */
class BotCommandScopeChatAdministrators extends BotCommandScope
{
    protected function boot(): void
    {
        $this->fields = [
            'type'    => FieldType::single('string'),
            'chat_id' => new FieldType('string', allowArrays: false, allowNull: false, subTypes: ['integer']),
        ];
    }

    public static function default(): static
    {
        return (new static())
            ->setType('chat_administrators');
    }
}
