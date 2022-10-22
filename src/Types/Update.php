<?php 

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;

class Update extends TypesBase implements TypesInterface
{
  public int $update_id;
  public ?Message $message;
  public ?Message $edited_message;
  public ?Message $channel_post;
  public ?Message $edited_channel_post;

  public function get()
  {
    return $this->getProperties($this);
  }
}
