<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents a custom keyboard with reply options (see Introduction to bots for details and examples).
 *
 * @see https://core.telegram.org/bots/api#replykeyboardmarkup
 */
class ReplyKeyboardMarkup extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'keyboard'                => FieldType::multiple(KeyboardButton::class),
            'is_persistent'           => FieldType::optional('boolean'),
            'resize_keyboard'         => FieldType::optional('boolean'),
            'one_time_keyboard'       => FieldType::optional('boolean'),
            'input_field_placeholder' => FieldType::optional('string'),
            'selective'               => FieldType::optional('boolean'),
        ];
    }
}
