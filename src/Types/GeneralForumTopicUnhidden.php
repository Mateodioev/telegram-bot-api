<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

/**
 * This object represents a service message about General forum topic unhidden in the chat. Currently holds no information.
 *
 * @see https://core.telegram.org/bots/api#generalforumtopicunhidden
 */
class GeneralForumTopicUnhidden extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [

        ];
    }
}
