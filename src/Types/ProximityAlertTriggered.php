<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents the content of a service message, sent whenever a user in the chat triggers a proximity alert set by another user.
 *
 * @property User $traveler User that triggered the alert
 * @property User $watcher User that set the alert
 * @property int $distance The distance between the users
 *
 * @method User traveler()
 * @method User watcher()
 * @method int distance()
 *
 * @method static setTraveler(User $traveler)
 * @method static setWatcher(User $watcher)
 * @method static setDistance(int $distance)
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
