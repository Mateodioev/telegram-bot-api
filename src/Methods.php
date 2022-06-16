<?php 

namespace Mateodioev\Bots\Telegram;

use Mateodioev\Utils\Files;
use Exception;

/**
 * Pre-defined Telegram bot API methods, `Most used methods`
 * @see https://core.telegram.org/bots/api
 * @link https://core.telegram.org/bots/api#available-methods
 */
class Methods extends Core
{
  public function sendMessage(string|int $chat_id, string $text)
  {
    $payload = ['chat_id' => $chat_id, 'text' => $text];
    return $this->request('sendMessage', $payload);
  }

  public function sendPhoto(string|int $chat_id, $photo, string $caption='')
  {
    $payload = ['chat_id' => $chat_id, 'photo' => Files::tryOpen($photo), 'caption' => $caption];
    return $this->request('sendPhoto', $payload);
  }

  public function editMessageText(string|int $chat_id, string $msg_id, string $text)
  {
    $payload = ['chat_id' => $chat_id, 'message_id' => $msg_id, 'text' => $text];
    return $this->request('editMessageText', $payload);
  }

  public function deleteMessage(string|int $chat_id, string $msg_id)
  {
    $payload = ['chat_id' => $chat_id, 'message_id' => $msg_id];
    return $this->request('deleteMessage', $payload);
  }

  public function sendAction(string $chat_id, string $action)
  {
    $payload = ['chat_id' => $chat_id, 'action' => $action];
    return $this->request('sendChatAction', $payload);
  }

  public function answerInlineQuery(string $inline_query_id, array $results)
  {
    if (count($results) > 50) throw new Exception('No more than 50 results per query are allowed');
    $payload = ['inline_query_id' => $inline_query_id, 'results' => json_encode($results)];
    return $this->request('answerInlineQuery', $payload);
  }
}
