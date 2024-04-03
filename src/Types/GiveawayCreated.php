<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

/**
 * This object represents a service message about the creation of a scheduled giveaway. Currently holds no information.
 *
 * @see https://core.telegram.org/bots/api#giveawaycreated
 */
class GiveawayCreated extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [

        ];
    }
}
