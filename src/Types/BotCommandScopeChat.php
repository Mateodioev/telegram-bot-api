<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Represents the scope of bot commands, covering a specific chat.
 *
 * @property string $type Scope type, must be chat
 * @property int|string $chat_id Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 *
 * @method string type()
 * @method int|string chatId()
 *
 * @method static setType(string $type)
 * @method static setChatId(int|string $chatId)
 *
 * @see https://core.telegram.org/bots/api#botcommandscopechat
 */
class BotCommandScopeChat extends BotCommandScope
{
    protected function boot(): void
    {
        $this->fields = [
            'type'    => FieldType::single('string'),
            'chat_id' => new FieldType('string', allowArrays: false, allowNull: false, subTypes: ['integer']),
        ];
    }
}
