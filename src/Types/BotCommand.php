<?php 

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

/**
 * This object represents a bot command.
 * 
 * @see https://core.telegram.org/bots/api#botcommand
 */
class BotCommand extends TypesBase implements TypesInterface
{
  public string $command;
  public string $description;

  public function __construct(stdClass $up) {
    $this->setCommand($up->command)
      ->setDescription($up->description);
  }

  public function setCommand(string $command): BotCommand
  {
    $this->command = $command;
    return $this;
  }

  public function setDescription(string $description): BotCommand
  {
    $this->description = $description;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}