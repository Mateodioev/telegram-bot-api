<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Represents a menu button, which opens the bot's list of commands.
 *
 * @property string $type Type of the button, must be commands
 *
 * @method string type()
 *
 * @method static setType(string $type)
 *
 * @see https://core.telegram.org/bots/api#menubuttoncommands
 */
class MenuButtonCommands extends MenuButton
{
    public const TYPE = 'commands';

    public function __construct(
        string $type = self::TYPE,
    ) {
        parent::__construct([
            'type' => $type,
        ]);
    }

    protected function boot(): void
    {
        $this->fields = [
            'type' => FieldType::single('string'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
