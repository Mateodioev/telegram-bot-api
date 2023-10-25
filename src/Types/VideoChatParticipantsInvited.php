<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents a service message about new members invited to a video chat.
 *
 * @property User[] $users New members that were invited to the video chat
 *
 * @method User[] users()
 *
 * @method static setUsers(User[] $users)
 *
 * @see https://core.telegram.org/bots/api#videochatparticipantsinvited
 */
class VideoChatParticipantsInvited extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'users' => FieldType::multiple(User::class),
        ];
    }
}
