<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * This object represents the content of a service message, sent whenever a user in the chat triggers a proximity alert set by another user.
 * 
 * @property User    $traveler User that triggered the alert
 * @property User    $watcher  User that set the alert
 * @property integer $distance The distance between the users
 * 
 * @method User    traveler()
 * @method User    watcher()
 * @method integer distance()
 * 
 * @method static setTraveler(User $traveler)
 * @method static setWatcher(User $watcher)
 * @method static setDistance(integer $distance)
 * 
 * @see https://core.telegram.org/bots/api#proximityalerttriggered
 */
class ProximityAlertTriggered extends baseType
{
    protected array $fields = [
        'traveler' => User::class,
        'watcher'  => User::class,
        'distance' => 'integer',
    ];
}
