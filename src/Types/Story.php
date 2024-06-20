<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents a story.
 *
 * @property Chat $chat Chat that posted the story
 * @property int $id Unique identifier for the story in the chat
 *
 * @method Chat chat()
 * @method int id()
 *
 * @method static setChat(Chat $chat)
 * @method static setId(int $id)
 *
 * @see https://core.telegram.org/bots/api#story
 */
class Story extends abstractType
{
    protected function boot(): void
    {
        if ($this->fields !== null) {
            // Already booted
            return;
        }
        $this->fields = [
            'chat' => FieldType::single(Chat::class),
            'id'   => FieldType::single('integer'),
        ];
    }
}
