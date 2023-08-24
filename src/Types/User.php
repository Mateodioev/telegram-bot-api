<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents a Telegram user or bot.
 *
 * @see https://core.telegram.org/bots/api#user
 */
class User extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'id'                          => FieldType::single('integer'),
            'is_bot'                      => FieldType::single('boolean'),
            'first_name'                  => FieldType::single('string'),
            'last_name'                   => FieldType::optional('string'),
            'username'                    => FieldType::optional('string'),
            'language_code'               => FieldType::optional('string'),
            'is_premium'                  => FieldType::optional('boolean'),
            'added_to_attachment_menu'    => FieldType::optional('boolean'),
            'can_join_groups'             => FieldType::optional('boolean'),
            'can_read_all_group_messages' => FieldType::optional('boolean'),
            'supports_inline_queries'     => FieldType::optional('boolean'),
        ];
    }
}
