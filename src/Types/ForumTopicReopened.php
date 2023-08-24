<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

/**
 * This object represents a service message about a forum topic reopened in the chat. Currently holds no information.
 *
 * @see https://core.telegram.org/bots/api#forumtopicreopened
 */
class ForumTopicReopened extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [

        ];
    }
}
