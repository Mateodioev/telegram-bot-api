<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents an inline keyboard that appears right next to the message it belongs to.
 * Note: This will only work in Telegram versions released after 9 April, 2016. Older clients will display unsupported message.
 *
 * @see https://core.telegram.org/bots/api#inlinekeyboardmarkup
 */
class InlineKeyboardMarkup extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'inline_keyboard' => FieldType::multiple(InlineKeyboardButton::class),
        ];
    }
}
