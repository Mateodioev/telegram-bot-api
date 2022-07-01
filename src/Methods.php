<?php 

namespace Mateodioev\Bots\Telegram;

use Mateodioev\Utils\Files;
use Mateodioev\Utils\Exceptions\KeyArrayException;
use function count, json_encode;

/**
 * Pre-defined Telegram bot API methods, `Most used methods`
 * @see https://core.telegram.org/bots/api
 * @link https://core.telegram.org/bots/api#available-methods
 */
class Methods extends Core
{
  /**
   * Use this method to send text messages
   *
   * @param string|integer $chat_id Unique identifier for the target chat or username
   * @param string $text Text of the message to be sent
   * @link https://core.telegram.org/bots/api#sendmessage
   */
  public function sendMessage(string|int $chat_id, string $text)
  {
    $payload = ['chat_id' => $chat_id, 'text' => $text];
    return $this->request('sendMessage', $payload);
  }

  /**
   * Use this method to send photos
   *
   * @param string|integer $chat_id Unique identifier for the target chat or username
   * @param $photo Photo to send, url or file
   * @param string $caption Photo caption
   * @link https://core.telegram.org/bots/api#sendphoto
   */
  public function sendPhoto(string|int $chat_id, $photo, string $caption='')
  {
    $payload = ['chat_id' => $chat_id, 'photo' => Files::tryOpen($photo), 'caption' => $caption];
    return $this->request('sendPhoto', $payload);
  }

  /**
   * Use this method to edit text and [game](https://core.telegram.org/bots/api#games) messages
   *
   * @param string|integer $chat_id Unique identifier for the target chat or username
   * @param string $msg_id Required if inline_message_id is not specified. Identifier of the message to edit
   * @param string $text New text of the message, 1-4096 characters after entities parsing
   * @link https://core.telegram.org/bots/api#editmessagetext
   */
  public function editMessageText(string|int $chat_id, string $msg_id, string $text)
  {
    $payload = ['chat_id' => $chat_id, 'message_id' => $msg_id, 'text' => $text];
    return $this->request('editMessageText', $payload);
  }

  /**
   * Use this method to delete a message, including service message
   *
   * @param string|integer $chat_id Unique identifier for the target chat or username
   * @param string $msg_id Identifier of the message to delete
   * @link https://core.telegram.org/bots/api#deletemessage
   */
  public function deleteMessage(string|int $chat_id, string $msg_id)
  {
    $payload = ['chat_id' => $chat_id, 'message_id' => $msg_id];
    return $this->request('deleteMessage', $payload);
  }

  /**
   * Send chat action
   * @link https://core.telegram.org/bots/api#sendchataction
   */
  public function sendAction(string $chat_id, string $action)
  {
    $payload = ['chat_id' => $chat_id, 'action' => $action];
    return $this->request('sendChatAction', $payload);
  }

  /**
   * Use this method to send answers to an inline query
   *
   * @param string $inline_query_id Unique identifier for the answered query
   * @param array $results A JSON-serialized array of results for the inline query
   * @link https://core.telegram.org/bots/api#answerinlinequery
   */
  public function answerInlineQuery(string $inline_query_id, array $results)
  {
    if (count($results) > 50) throw new KeyArrayException('No more than 50 results per query are allowed');

    $payload = ['inline_query_id' => $inline_query_id, 'results' => json_encode($results)];
    return $this->request('answerInlineQuery', $payload);
  }
}
