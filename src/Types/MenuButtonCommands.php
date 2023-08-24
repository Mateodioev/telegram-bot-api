<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Represents a menu button, which opens the bot's list of commands.
 *
 * @see https://core.telegram.org/bots/api#menubuttoncommands
 */
class MenuButtonCommands extends MenuButton
{
    protected function boot(): void
    {
        $this->fields = [
            'type' => FieldType::single('string'),
        ];
    }
}
