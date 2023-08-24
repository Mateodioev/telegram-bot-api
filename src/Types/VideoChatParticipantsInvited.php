<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents a service message about new members invited to a video chat.
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
