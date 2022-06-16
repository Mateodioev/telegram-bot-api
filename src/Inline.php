<?php

namespace Mateodioev\Bots\Telegram;

use Mateodioev\Utils\Arrays;

/**
 * Responds answers inline queries
 */
class Inline
{
  private array $params = [];

  /**
   * Gen random id to answer callback_query
   */
  final public function genId(int $length = 10): string
  {
    $str = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ' . rand() . time();
    $length_str = strlen($str) - 1;

    $id = '';
    for ($i=0; $i < $length; $i++) { 
      $index = mt_rand(0, $length_str);
      $id .= $str[$index];
    }

    return $id;
  }

  public function addParams(array $params)
  {
    $params = array_merge($params, $this->params);
    $this->params = $this->DeleteEmpty($params);
    return $this->params;
  }

  /**
   * Delete key empty values from array
   */
  private function DeleteEmpty(array $my_array): array
  {
    return Arrays::DeleteEmptyKeys($my_array);
  }

  /**
   * This object represents the content of a message to be sent as a result of an inline query.
   *
   * @see https://core.telegram.org/bots/api#inputmessagecontent
   */
  public function InputMessageContent(string $msg, string $parse_mode = 'HTML', array $entities = [], bool $disable_web_page_preview = true): array
  {
    return $this->DeleteEmpty([
      'message_text' => $msg,
      'parse_mode' => $parse_mode,
      'entities' => $entities,
      'disable_web_page_preview' => $disable_web_page_preview
    ]);
  }

  public function __call($method, $fields): array
  {
    $method = strtolower($method);
    $type = str_replace(['inlinequeryresultcached', 'inlinequeryresult'], '', $method);

    $params = $fields[0] ?? [];
    $payload = ['type' => $type, 'id' => $params['id'] ?? $this->genId()];
    $payload = $this->addParams(array_merge($payload, $params));

    $this->params = [];
    return $payload;
  }
}

