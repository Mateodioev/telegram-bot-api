<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * The boost was obtained by the creation of Telegram Premium gift codes to boost a chat. Each such code boosts the chat 4 times for the duration of the corresponding Telegram Premium subscription.
 *
 * @property string $source Source of the boost, always "gift_code"
 * @property User $user User for which the gift code was created
 *
 * @method string source()
 * @method User user()
 *
 * @method static setSource(string $source)
 * @method static setUser(User $user)
 *
 * @see https://core.telegram.org/bots/api#chatboostsourcegiftcode
 */
class ChatBoostSourceGiftCode extends ChatBoostSource
{
    protected function boot(): void
    {
        $this->fields = [
            'source' => FieldType::single('string'),
            'user'   => FieldType::single(User::class),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }

    public static function default(): static
    {
        return (new static())
            ->setSource('gift_code');
    }
}
