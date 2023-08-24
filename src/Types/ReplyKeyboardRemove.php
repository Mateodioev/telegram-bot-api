<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Upon receiving a message with this object, Telegram clients will remove the current custom keyboard and display the default letter-keyboard. By default, custom keyboards are displayed until a new keyboard is sent by a bot. An exception is made for one-time keyboards that are hidden immediately after the user presses a button (see ReplyKeyboardMarkup).
 *
 * @see https://core.telegram.org/bots/api#replykeyboardremove
 */
class ReplyKeyboardRemove extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'remove_keyboard' => FieldType::single('boolean'),
            'selective'       => FieldType::optional('boolean'),
        ];
    }
}
