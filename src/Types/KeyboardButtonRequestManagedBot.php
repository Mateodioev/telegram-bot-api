<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * This object defines the parameters for the creation of a managed bot. Information about the created bot will be shared with the bot using the update managed_bot and a Message with the field managed_bot_created.
 *
 * @property int $request_id Signed 32-bit identifier of the request. Must be unique within the message
 * @property string|null $suggested_name Optional. Suggested name for the bot
 * @property string|null $suggested_username Optional. Suggested username for the bot
 *
 * @method int requestId()
 * @method string|null suggestedName()
 * @method string|null suggestedUsername()
 *
 * @method static setRequestId(int $requestId)
 * @method static setSuggestedName(string|null $suggestedName)
 * @method static setSuggestedUsername(string|null $suggestedUsername)
 *
 * @see https://core.telegram.org/bots/api#keyboardbuttonrequestmanagedbot
 */
class KeyboardButtonRequestManagedBot extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'request_id'         => FieldType::single('integer'),
            'suggested_name'     => FieldType::optional('string'),
            'suggested_username' => FieldType::optional('string'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
