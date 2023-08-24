<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Represents the scope of bot commands, covering all administrators of a specific group or supergroup chat.
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
}
