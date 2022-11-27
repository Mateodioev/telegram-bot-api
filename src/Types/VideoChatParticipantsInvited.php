<?php

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

/**
 * This object represents a service message about new members invited to a video chat.
 * 
 * @see https://core.telegram.org/bots/api#videochatparticipantsinvited
 */
class VideoChatParticipantsInvited extends TypesBase implements TypesInterface
{
  public array $users;

  public function __construct(stdClass $up) {
    $this->setUsers(User::bulkCreate($up->users));
  }

  public function setUsers(array $users): VideoChatParticipantsInvited
  {
    $this->users = $users;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}
