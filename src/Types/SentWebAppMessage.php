<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Describes an inline message sent by a Web App on behalf of a user.
 *
 * @property string|null $inline_message_id Optional. Identifier of the sent inline message. Available only if there is an inline keyboard attached to the message.
 *
 * @method string|null inlineMessageId()
 *
 * @method static setInlineMessageId(string|null $inlineMessageId)
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
