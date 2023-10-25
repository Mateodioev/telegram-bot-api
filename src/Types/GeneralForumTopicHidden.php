<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

/**
 * This object represents a service message about General forum topic hidden in the chat. Currently holds no information.
 *
 * @see https://core.telegram.org/bots/api#generalforumtopichidden
 */
class GeneralForumTopicHidden extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [

        ];
    }
}
