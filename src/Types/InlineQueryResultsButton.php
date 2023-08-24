<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents a button to be shown above inline query results. You must use exactly one of the optional fields.
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultsbutton
 */
class InlineQueryResultsButton extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'text'            => FieldType::single('string'),
            'web_app'         => FieldType::optional(WebAppInfo::class),
            'start_parameter' => FieldType::optional('string'),
        ];
    }
}
