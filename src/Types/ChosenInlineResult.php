<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Represents a result of an inline query that was chosen by the user and sent to their chat partner.
 * Note: It is necessary to enable inline feedback via @BotFather in order to receive these objects in updates.
 *
 * @see https://core.telegram.org/bots/api#choseninlineresult
 */
class ChosenInlineResult extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'result_id'         => FieldType::single('string'),
            'from'              => FieldType::single(User::class),
            'location'          => FieldType::optional(Location::class),
            'inline_message_id' => FieldType::optional('string'),
            'query'             => FieldType::single('string'),
        ];
    }
}
