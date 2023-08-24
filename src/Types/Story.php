<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

/**
 * This object represents a message about a forwarded story in the chat. Currently holds no information.
 *
 * @see https://core.telegram.org/bots/api#story
 */
class Story extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [

        ];
    }
}
