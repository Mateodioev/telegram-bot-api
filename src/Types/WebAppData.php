<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Describes data sent from a Web App to the bot.
 *
 * @see https://core.telegram.org/bots/api#webappdata
 */
class WebAppData extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'data'        => FieldType::single('string'),
            'button_text' => FieldType::single('string'),
        ];
    }
}
