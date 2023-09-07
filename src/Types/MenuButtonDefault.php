<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Describes that no specific value for the menu button was set.
 *
 * @property string $type Type of the button, must be default
 *
 * @method string type()
 *
 * @method static setType(string $type)
 *
 * @see https://core.telegram.org/bots/api#menubuttondefault
 */
class MenuButtonDefault extends MenuButton
{
    protected function boot(): void
    {
        $this->fields = [
            'type' => FieldType::single('string'),
        ];
    }

    public static function default(): static
    {
        return (new static())
            ->setType('default');
    }
}
