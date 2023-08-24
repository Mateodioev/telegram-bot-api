<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents the content of a service message, sent whenever a user in the chat triggers a proximity alert set by another user.
 *
 * @see https://core.telegram.org/bots/api#proximityalerttriggered
 */
class ProximityAlertTriggered extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'traveler' => FieldType::single(User::class),
            'watcher'  => FieldType::single(User::class),
            'distance' => FieldType::single('integer'),
        ];
    }
}
