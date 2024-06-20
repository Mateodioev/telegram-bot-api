<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents a boost added to a chat or changed.
 *
 * @property Chat $chat Chat which was boosted
 * @property ChatBoost $boost Information about the chat boost
 *
 * @method Chat chat()
 * @method ChatBoost boost()
 *
 * @method static setChat(Chat $chat)
 * @method static setBoost(ChatBoost $boost)
 *
 * @see https://core.telegram.org/bots/api#chatboostupdated
 */
class ChatBoostUpdated extends abstractType
{
    protected function boot(): void
    {
        if ($this->fields !== null) {
            // Already booted
            return;
        }
        $this->fields = [
            'chat'  => FieldType::single(Chat::class),
            'boost' => FieldType::single(ChatBoost::class),
        ];
    }
}
