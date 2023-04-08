<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * Represents a location to which a chat is connected.
 * 
 * @property Location $location The location to which the supergroup is connected. Can't be a live location.
 * @property string   $address  Location address; 1-64 characters, as defined by the chat owner
 * 
 * @method Location location()
 * @method string   address()
 * 
 * @method static setLocation(Location $location)
 * @method static setAddress(string $address)
 * 
 * @see https://core.telegram.org/bots/api#chatlocation
 */
class ChatLocation extends baseType
{
    protected array $fields = [
        'location' => Location::class,
        'address'  => 'string',
    ];
}
