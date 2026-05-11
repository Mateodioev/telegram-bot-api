<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * This object contains information about the bot that was created to be managed by the current bot.
 *
 * @property User $bot Information about the bot. The bot's token can be fetched using the method getManagedBotToken.
 *
 * @method User bot()
 *
 * @method static setBot(User $bot)
 *
 * @see https://core.telegram.org/bots/api#managedbotcreated
 */
class ManagedBotCreated extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'bot' => FieldType::single(User::class),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
