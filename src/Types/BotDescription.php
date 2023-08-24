<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents the bot's description.
 *
 * @see https://core.telegram.org/bots/api#botdescription
 */
class BotDescription extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'description' => FieldType::single('string'),
        ];
    }
}
