<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * This [object](https://core.telegram.org/bots/api#available-types) represents an incoming update.
 * 
 * @property integer $update_id The update's unique identifier. Update identifiers start from a certain positive number and increase sequentially. This ID becomes especially handy if you're using webhooks, since it allows you to ignore repeated updates or to restore the correct update sequence, should they get out of order. If there are no new updates for at least a week, then identifier of the next update will be chosen randomly instead of sequentially.
 * @property ?Message $message Optional. New incoming message of any kind - text, photo, sticker, etc.
 * @property ?Message $edited_message Optional. New version of a message that is known to the bot and was edited
 * @property ?Message $channel_post Optional. New incoming channel post of any kind - text, photo, sticker, etc.
 * @property ?Message $edited_channel_post Optional. New version of a channel post that is known to the bot and was edited
 * @property ?InlineQuery $inline_query Optional. New incoming [inline](https://core.telegram.org/bots/api#inline-mode) query
 * @property ?ChosenInlineResult $chosen_inline_result Optional. The result of an [inline](https://core.telegram.org/bots/api#inline-mode) query that was chosen by a user and sent to their chat partner. Please see our documentation on the [feedback collecting](https://core.telegram.org/bots/inline#collecting-feedback) for details on how to enable these updates for your bot.
 * @property ?CallbackQuery $callback_query Optional. New incoming callback query
 * @property ?ShippingQuery $shipping_query Optional. New incoming shipping query. Only for invoices with flexible price
 * @property ?PreCheckoutQuery $pre_checkout_query Optional. New incoming pre-checkout query. Contains full information about checkout
 * @property ?Poll $poll Optional. New poll state. Bots receive only updates about stopped polls and polls, which are sent by the bot
 * @property ?PollAnswer $poll_answer Optional. A user changed their answer in a non-anonymous poll. Bots receive new votes only in polls that were sent by the bot itself.
 * @property ?ChatMemberUpdated $my_chat_member Optional. The bot's chat member status was updated in a chat. For private chats, this update is received only when the bot is blocked or unblocked by the user.
 * @property ?ChatMemberUpdated $chat_member Optional. A chat member's status was updated in a chat. The bot must be an administrator in the chat and must explicitly specify “chat_member” in the list of allowed_updates to receive these updates
 * @property ?ChatJoinRequest $chat_join_request Optional. A request to join the chat has been sent. The bot must have the can_invite_users administrator right in the chat to receive these updates.
 * 
 * @method integer updateId()
 * @method ?Message message()
 * @method ?Message editedMessage()
 * @method ?Message channelPost()
 * @method ?Message editedChannelPost()
 * @method ?InlineQuery inlineQuery()
 * @method ?ChosenInlineResult chosenInlineResult()
 * @method ?CallbackQuery callbackQuery()
 * @method ?ShippingQuery shippingQuery()
 * @method ?PreCheckoutQuery preCheckoutQuery()
 * @method ?Poll poll()
 * @method ?PollAnswer pollAnswer()
 * @method ?ChatMemberUpdated myChatMember()
 * @method ?ChatMemberUpdated chatMember()
 * @method ?ChatJoinRequest chatJoinRequest()
 * 
 * @method static setUpdateId(integer $updateId)
 * @method static setMessage(Message $message)
 * @method static setEditedMessage(Message $editedMessage)
 * @method static setChannelPost(Message $channelPost)
 * @method static setEditedChannelPost(Message $editedChannelPost)
 * @method static setInlineQuery(InlineQuery $inlineQuery)
 * @method static setChosenInlineResult(ChosenInlineResult $chosenInlineResult)
 * @method static setCallbackQuery(CallbackQuery $callbackQuery)
 * @method static setShippingQuery(ShippingQuery $shippingQuery)
 * @method static setPreCheckoutQuery(PreCheckoutQuery $preCheckoutQuery)
 * @method static setPoll(Poll $poll)
 * @method static setPollAnswer(PollAnswer $pollAnswer)
 * @method static setMyChatMember(ChatMemberUpdated $myChatMember)
 * @method static setChatMember(ChatMemberUpdated $chatMember)
 * @method static setChatJoinRequest(ChatJoinRequest $chatJoinRequest)
 * 
 * @see https://core.telegram.org/bots/api#update
 */
class Update extends baseType
{
    protected array $fields = [
        'update_id'            => 'integer',
        'message'              => Message::class,
        'edited_message'       => Message::class,
        'channel_post'         => Message::class,
        'edited_channel_post'  => Message::class,
        'inline_query'         => InlineQuery::class,
        'chosen_inline_result' => ChosenInlineResult::class,
        'callback_query'       => CallbackQuery::class,
        'shipping_query'       => ShippingQuery::class,
        'pre_checkout_query'   => PreCheckoutQuery::class,
        'poll'                 => Poll::class,
        'poll_answer'          => PollAnswer::class,
        'my_chat_member'       => ChatMemberUpdated::class,
        'chat_member'          => ChatMemberUpdated::class,
        'chat_join_request'    => ChatJoinRequest::class,
    ];
}
