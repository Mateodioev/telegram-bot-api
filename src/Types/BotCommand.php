<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents a bot command.
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
