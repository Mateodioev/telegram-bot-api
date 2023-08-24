<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object contains information about the user whose identifier was shared with the bot using a KeyboardButtonRequestUser button.
 *
 * @see https://core.telegram.org/bots/api#usershared
 */
class UserShared extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'request_id' => FieldType::single('integer'),
            'user_id'    => FieldType::single('integer'),
        ];
    }
}
