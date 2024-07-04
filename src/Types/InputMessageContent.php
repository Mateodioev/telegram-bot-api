<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldsStorage;

/**
 * This object represents the content of a message to be sent as a result of an inline query. Telegram clients currently support the following 5 types:
 * - InputTextMessageContent
 * - InputLocationMessageContent
 * - InputVenueMessageContent
 * - InputContactMessageContent
 * - InputInvoiceMessageContent
 *
 * @see https://core.telegram.org/bots/api#inputmessagecontent
 */
class InputMessageContent extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }

    public static function childs(): array
    {
        return [
            InputTextMessageContent::class,
            InputLocationMessageContent::class,
            InputVenueMessageContent::class,
            InputContactMessageContent::class,
            InputInvoiceMessageContent::class,
        ];
    }
}
