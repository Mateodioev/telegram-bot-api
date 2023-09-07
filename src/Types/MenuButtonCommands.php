<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Represents a menu button, which opens the bot's list of commands.
 *
 * @property string $type Type of the button, must be commands
 *
 * @method string type()
 *
 * @method static setType(string $type)
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

    public static function default(): static
    {
        return (new static())
            ->setType('commands');
    }
}
