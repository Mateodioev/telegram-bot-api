<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Describes an inline message sent by a Web App on behalf of a user.
 *
 * @see https://core.telegram.org/bots/api#sentwebappmessage
 */
class SentWebAppMessage extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'inline_message_id' => FieldType::optional('string'),
        ];
    }
}
