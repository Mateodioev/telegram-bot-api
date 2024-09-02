<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * The boost was obtained by subscribing to Telegram Premium or by gifting a Telegram Premium subscription to another user.
 *
 * @property string $source Source of the boost, always "premium"
 * @property User $user User that boosted the chat
 *
 * @method string source()
 * @method User user()
 *
 * @method static setSource(string $source)
 * @method static setUser(User $user)
 *
 * @see https://core.telegram.org/bots/api#chatboostsourcepremium
 */
class ChatBoostSourcePremium extends ChatBoostSource
{
    public function __construct(
        string $source,
        User $user,
    ) {
        parent::__construct([
            'source' => $source,
            'user'   => $user,
        ]);
    }

    protected function boot(): void
    {
        $this->fields = [
            'source' => FieldType::single('string'),
            'user'   => FieldType::single(User::class),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
