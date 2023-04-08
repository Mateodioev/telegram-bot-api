<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * This object represents a bot command.
 * 
 * @property string $command     Text of the command; 1-32 characters. Can contain only lowercase English letters, digits and underscores.
 * @property string $description Description of the command; 1-256 characters.
 * 
 * @method string command()     Text of the command
 * @method string description() Description of the command
 * 
 * @method static setCommand(string $command)
 * @method static setDescription(string $description)
 * 
 * @see https://core.telegram.org/bots/api#botcommand
 */
class BotCommand extends baseType
{
    protected array $fields = [
        'command'     => 'string',
        'description' => 'string'
    ];
}