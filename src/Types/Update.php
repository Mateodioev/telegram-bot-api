<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents an incoming update.
 * At most one of the optional parameters can be present in any given update.
 *
 * @see https://core.telegram.org/bots/api#update
 */
class Update extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'update_id'            => FieldType::single('integer'),
            'message'              => FieldType::optional(Message::class),
            'edited_message'       => FieldType::optional(Message::class),
            'channel_post'         => FieldType::optional(Message::class),
            'edited_channel_post'  => FieldType::optional(Message::class),
            'inline_query'         => FieldType::optional(InlineQuery::class),
            'chosen_inline_result' => FieldType::optional(ChosenInlineResult::class),
            'callback_query'       => FieldType::optional(CallbackQuery::class),
            'shipping_query'       => FieldType::optional(ShippingQuery::class),
            'pre_checkout_query'   => FieldType::optional(PreCheckoutQuery::class),
            'poll'                 => FieldType::optional(Poll::class),
            'poll_answer'          => FieldType::optional(PollAnswer::class),
            'my_chat_member'       => FieldType::optional(ChatMemberUpdated::class),
            'chat_member'          => FieldType::optional(ChatMemberUpdated::class),
            'chat_join_request'    => FieldType::optional(ChatJoinRequest::class),
        ];
    }
}
