<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * This object represents a list of boosts added to a chat by a user.
 *
 * @property ChatBoost[] $boosts The list of boosts added to the chat by the user
 *
 * @method ChatBoost[] boosts()
 *
 * @method static setBoosts(ChatBoost[] $boosts)
 *
 * @see https://core.telegram.org/bots/api#userchatboosts
 */
class UserChatBoosts extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'boosts' => FieldType::array(ChatBoost::class),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
