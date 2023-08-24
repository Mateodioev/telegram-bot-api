<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents a parameter of the inline keyboard button used to automatically authorize a user. Serves as a great replacement for the Telegram Login Widget when the user is coming from Telegram. All the user needs to do is tap/click a button and confirm that they want to log in:
 * Telegram apps support these buttons as of version 5.7.
 *
 * @see https://core.telegram.org/bots/api#loginurl
 */
class LoginUrl extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'url'                  => FieldType::single('string'),
            'forward_text'         => FieldType::optional('string'),
            'bot_username'         => FieldType::optional('string'),
            'request_write_access' => FieldType::optional('boolean'),
        ];
    }
}
