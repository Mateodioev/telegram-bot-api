<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents an incoming update.
 * At most one of the optional parameters can be present in any given update.
 *
 * @property int $update_id The update's unique identifier. Update identifiers start from a certain positive number and increase sequentially. This ID becomes especially handy if you're using webhooks, since it allows you to ignore repeated updates or to restore the correct update sequence, should they get out of order. If there are no new updates for at least a week, then identifier of the next update will be chosen randomly instead of sequentially.
 * @property Message|null $message Optional. New incoming message of any kind - text, photo, sticker, etc.
 * @property Message|null $edited_message Optional. New version of a message that is known to the bot and was edited
 * @property Message|null $channel_post Optional. New incoming channel post of any kind - text, photo, sticker, etc.
 * @property Message|null $edited_channel_post Optional. New version of a channel post that is known to the bot and was edited
 * @property InlineQuery|null $inline_query Optional. New incoming inline query
 * @property ChosenInlineResult|null $chosen_inline_result Optional. The result of an inline query that was chosen by a user and sent to their chat partner. Please see our documentation on the feedback collecting for details on how to enable these updates for your bot.
 * @property CallbackQuery|null $callback_query Optional. New incoming callback query
 * @property ShippingQuery|null $shipping_query Optional. New incoming shipping query. Only for invoices with flexible price
 * @property PreCheckoutQuery|null $pre_checkout_query Optional. New incoming pre-checkout query. Contains full information about checkout
 * @property Poll|null $poll Optional. New poll state. Bots receive only updates about stopped polls and polls, which are sent by the bot
 * @property PollAnswer|null $poll_answer Optional. A user changed their answer in a non-anonymous poll. Bots receive new votes only in polls that were sent by the bot itself.
 * @property ChatMemberUpdated|null $my_chat_member Optional. The bot's chat member status was updated in a chat. For private chats, this update is received only when the bot is blocked or unblocked by the user.
 * @property ChatMemberUpdated|null $chat_member Optional. A chat member's status was updated in a chat. The bot must be an administrator in the chat and must explicitly specify "chat_member" in the list of allowed_updates to receive these updates.
 * @property ChatJoinRequest|null $chat_join_request Optional. A request to join the chat has been sent. The bot must have the can_invite_users administrator right in the chat to receive these updates.
 *
 * @method int updateId()
 * @method Message|null message()
 * @method Message|null editedMessage()
 * @method Message|null channelPost()
 * @method Message|null editedChannelPost()
 * @method InlineQuery|null inlineQuery()
 * @method ChosenInlineResult|null chosenInlineResult()
 * @method CallbackQuery|null callbackQuery()
 * @method ShippingQuery|null shippingQuery()
 * @method PreCheckoutQuery|null preCheckoutQuery()
 * @method Poll|null poll()
 * @method PollAnswer|null pollAnswer()
 * @method ChatMemberUpdated|null myChatMember()
 * @method ChatMemberUpdated|null chatMember()
 * @method ChatJoinRequest|null chatJoinRequest()
 *
 * @method static setUpdateId(int $updateId)
 * @method static setMessage(Message|null $message)
 * @method static setEditedMessage(Message|null $editedMessage)
 * @method static setChannelPost(Message|null $channelPost)
 * @method static setEditedChannelPost(Message|null $editedChannelPost)
 * @method static setInlineQuery(InlineQuery|null $inlineQuery)
 * @method static setChosenInlineResult(ChosenInlineResult|null $chosenInlineResult)
 * @method static setCallbackQuery(CallbackQuery|null $callbackQuery)
 * @method static setShippingQuery(ShippingQuery|null $shippingQuery)
 * @method static setPreCheckoutQuery(PreCheckoutQuery|null $preCheckoutQuery)
 * @method static setPoll(Poll|null $poll)
 * @method static setPollAnswer(PollAnswer|null $pollAnswer)
 * @method static setMyChatMember(ChatMemberUpdated|null $myChatMember)
 * @method static setChatMember(ChatMemberUpdated|null $chatMember)
 * @method static setChatJoinRequest(ChatJoinRequest|null $chatJoinRequest)
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
