<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * This object represents a service message about new members invited to a video chat.
 * 
 * @property User[] $user New members that were invited to the video chat
 * 
 * @method User[] user()
 * 
 * @method static setUser(User[] $user)
 * 
 * @see https://core.telegram.org/bots/api#videochatparticipantsinvited
 */
class VideoChatParticipantsInvited extends baseType
{
    protected array $fields = [
        'user' => [User::class],
    ];
}
