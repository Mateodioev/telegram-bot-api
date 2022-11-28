<?php 

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

/**
 * This object represents an incoming update
 * 
 * https://core.telegram.org/bots/api#update
 */
class Update extends TypesBase implements TypesInterface
{
  public int $update_id;
  public ?Message $message;
  public ?Message $edited_message;
  public ?Message $channel_post;
  public ?Message $edited_channel_post;
  public ?InlineQuery $inline_query;
  public ?ChosenInlineResult $chosen_inline_result;
  public ?CallbackQuery $callback_query;
  public ?ShippingQuery $shipping_query;
  public ?PreCheckoutQuery $pre_checkout_query;
  public ?Poll $poll;
  public ?PollAnswer $poll_answer;
  public ?ChatMemberUpdated $my_chat_member;
  public ?ChatMemberUpdated $chat_member;
  public ?ChatJoinRequest $chat_join_request;

  public function __construct(?stdClass $up) {
    $this->setUpdateId($up->update_id)
      ->setMessage(Message::create($up->message ?? self::DEFAULT_PARAM))
      ->setEditedMessage(Message::create($up->edited_message ?? self::DEFAULT_PARAM))
      ->setChannelPost(Message::create($up->channel_post  ?? self::DEFAULT_PARAM))
      ->setEditedChannelPost(Message::create($up->edited_channel_post ?? self::DEFAULT_PARAM))
      ->setInlineQuery(InlineQuery::create($up->inline_query ?? self::DEFAULT_PARAM))
      ->setChosenInlineResult(ChosenInlineResult::create($up->chosen_inline_result ?? self::DEFAULT_PARAM))
      ->setCallbackQuery(CallbackQuery::create($up->callback_query ?? self::DEFAULT_PARAM))
      ->setShippingQuery(ShippingQuery::create($up->shipping_query ?? self::DEFAULT_PARAM))
      ->setPreCheckoutQuery(PreCheckoutQuery::create($up->pre_checkout_query ?? self::DEFAULT_PARAM))
      ->setPoll(Poll::create($up->poll ?? self::DEFAULT_PARAM))
      ->setPollAnswer(PollAnswer::create($up->poll_answer ?? self::DEFAULT_PARAM))
      ->setMyChatMember(ChatMemberUpdated::create($up->my_chat_member ?? self::DEFAULT_PARAM))
      ->setChatMember(ChatMemberUpdated::create($up->chat_member ?? self::DEFAULT_PARAM))
      ->setChatJoinRequest(ChatJoinRequest::create($up->chat_join_request ?? self::DEFAULT_PARAM));
  }

  public function setUpdateId(int $updateId): Update
  {
    $this->update_id = $updateId;
    return $this;
  }

  public function setMessage(?Message $message): Update
  {
    $this->message = $message;
    return $this;
  }

  public function setEditedMessage(?Message $message): Update
  {
    $this->edited_message = $message;
    return $this;
  }

  public function setChannelPost(?Message $ChannelPost): Update
  {
    $this->channel_post = $ChannelPost;
    return $this;
  }

  public function setEditedChannelPost(?Message $editedChannelPost): Update
  {
    $this->edited_channel_post = $editedChannelPost;
    return $this;
  }

  public function setInlineQuery(?InlineQuery $inlineQuery): Update
  {
    $this->inline_query = $inlineQuery;
    return $this;
  }

  public function setChosenInlineResult(?ChosenInlineResult $chosenInlineResult): Update
  {
    $this->chosen_inline_result = $chosenInlineResult;
    return $this;
  }

  public function setCallbackQuery(?CallbackQuery $callbackQuery): Update
  {
    $this->callback_query = $callbackQuery;
    return $this;
  }

  public function setShippingQuery(?ShippingQuery $shippingQuery): Update
  {
    $this->shipping_query = $shippingQuery;
    return $this;
  }

  public function setPreCheckoutQuery(?PreCheckoutQuery $preCheckoutQuery): Update
  {
    $this->pre_checkout_query = $preCheckoutQuery;
    return $this;
  }

  public function setPoll(?Poll $poll): Update
  {
    $this->poll = $poll;
    return $this;
  }

  public function setPollAnswer(?PollAnswer $pollAnswer): Update
  {
    $this->poll_answer = $pollAnswer;
    return $this;
  }

  public function setMyChatMember(?ChatMemberUpdated $myChatMember): Update
  {
    $this->my_chat_member = $myChatMember;
    return $this;
  }

  public function setChatMember(?ChatMemberUpdated $chatMember): Update
  {
    $this->chat_member = $chatMember;
    return $this;
  }

  public function setChatJoinRequest(?ChatJoinRequest $chatJoinRequest): Update
  {
    $this->chat_join_request = $chatJoinRequest;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }

}
