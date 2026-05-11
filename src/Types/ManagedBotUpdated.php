<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * This object contains information about the creation, token update, or owner update of a bot that is managed by the current bot.
 *
 * @property User $user User that created the bot
 * @property User $bot Information about the bot. Token of the bot can be fetched using the method getManagedBotToken.
 *
 * @method User user()
 * @method User bot()
 *
 * @method static setUser(User $user)
 * @method static setBot(User $bot)
 *
 * @see https://core.telegram.org/bots/api#managedbotupdated
 */
class ManagedBotUpdated extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'user' => FieldType::single(User::class),
            'bot'  => FieldType::single(User::class),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
