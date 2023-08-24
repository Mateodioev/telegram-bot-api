<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Describes that no specific value for the menu button was set.
 *
 * @see https://core.telegram.org/bots/api#menubuttondefault
 */
class MenuButtonDefault extends MenuButton
{
    protected function boot(): void
    {
        $this->fields = [
            'type' => FieldType::single('string'),
        ];
    }
}
