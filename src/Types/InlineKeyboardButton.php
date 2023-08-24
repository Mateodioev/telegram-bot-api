<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents one button of an inline keyboard. You must use exactly one of the optional fields.
 *
 * @see https://core.telegram.org/bots/api#inlinekeyboardbutton
 */
class InlineKeyboardButton extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'text'                             => FieldType::single('string'),
            'url'                              => FieldType::optional('string'),
            'callback_data'                    => FieldType::optional('string'),
            'web_app'                          => FieldType::optional(WebAppInfo::class),
            'login_url'                        => FieldType::optional(LoginUrl::class),
            'switch_inline_query'              => FieldType::optional('string'),
            'switch_inline_query_current_chat' => FieldType::optional('string'),
            'switch_inline_query_chosen_chat'  => FieldType::optional(SwitchInlineQueryChosenChat::class),
            'callback_game'                    => FieldType::optional(CallbackGame::class),
            'pay'                              => FieldType::optional('boolean'),
        ];
    }
}
