<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents the bot's short description.
 *
 * @see https://core.telegram.org/bots/api#botshortdescription
 */
class BotShortDescription extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'short_description' => FieldType::single('string'),
        ];
    }
}
