<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Describes why a request was unsuccessful.
 *
 * @property int|null $migrate_to_chat_id Optional. The group has been migrated to a supergroup with the specified identifier. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing this identifier.
 * @property int|null $retry_after Optional. In case of exceeding flood control, the number of seconds left to wait before the request can be repeated
 *
 * @method int|null migrateToChatId()
 * @method int|null retryAfter()
 *
 * @method static setMigrateToChatId(int|null $migrateToChatId)
 * @method static setRetryAfter(int|null $retryAfter)
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
