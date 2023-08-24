<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents the bot's name.
 *
 * @property string $name The bot's name
 *
 * @method string name()
 *
 * @method static setName(string $name)
 *
 * @see https://core.telegram.org/bots/api#botname
 */
class BotName extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'name' => FieldType::single('string'),
        ];
    }
}
