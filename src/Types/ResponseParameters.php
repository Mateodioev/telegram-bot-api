<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Describes why a request was unsuccessful.
 *
 * @see https://core.telegram.org/bots/api#responseparameters
 */
class ResponseParameters extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'migrate_to_chat_id' => FieldType::optional('integer'),
            'retry_after'        => FieldType::optional('integer'),
        ];
    }
}
