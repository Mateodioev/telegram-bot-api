<?php

namespace Mateodioev\Bots\Telegram;

use Mateodioev\Utils\Arrays;

use function json_encode;

/**
 * @deprecated v3.6.0 Use {@see \Mateodioev\Bots\Telegram\Buttons\ButtonFactory} instead.
 */
class Buttons
{
  private array $button = [];

  private string $type;
  private int $line = 0;

  private function __construct(string $type, array $others_params)
  {
    $this->type = $type;

    if (!empty($others_params)) {
      foreach ($others_params as $i => $value) {
        $this->button[$i] = $value;
      }
    }
  }

  /**
   * @param string $type inline_keyboard, keyboard
   * @param array $others_params
   * @return Buttons
   */
  public static function create(string $type = 'inline_keyboard', array $others_params = []): Buttons
  {
    return new self($type, $others_params);
  }

  /**
   * remove reply keyboard
   */
  public static function replyKeyboardRemove(bool $selective = false): Buttons
  {
    return new self('', [
      'remove_keyboard' => true,
      'selective' => $selective
    ]);
  }

  /**
   * Add new line to the button
   */
  public function AddLine(): Buttons
  {
    $this->line++;
    return $this;
  }

  /**
   * Add new ceil
   */
  public function addCeil(array $params): Buttons
  {
    $this->button[$this->type][$this->line][] = $params;
    return $this;
  }

  /**
   * add new keyboard ceil
   */
  public function addKeyboard(
    string $text,
    bool $request_contact = false,
    bool $request_location = false,
    mixed $request_poll = null,
    object $web_app = null
  ): Buttons {
    $payload = [
      'text' => $text,
      'request_contact' => $request_contact,
      'request_location' => $request_location,
      'request_poll' => $request_poll,
      'web_app' => $web_app
    ];

    Arrays::DeleteEmptyKeys($payload);
    $this->button[$this->type][$this->line][] = $payload;
    return $this;
  }

  public function __toString(): string
  {
    return json_encode($this->button);
  }

  public function get(): array
  {
    return $this->button;
  }
}
