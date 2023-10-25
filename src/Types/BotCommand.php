<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents a bot command.
 *
 * @property string $command Text of the command; 1-32 characters. Can contain only lowercase English letters, digits and underscores.
 * @property string $description Description of the command; 1-256 characters.
 *
 * @method string command()
 * @method string description()
 *
 * @method static setCommand(string $command)
 * @method static setDescription(string $description)
 *
 * @see https://core.telegram.org/bots/api#botcommand
 */
class BotCommand extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'command'     => FieldType::single('string'),
            'description' => FieldType::single('string'),
        ];
    }
}
