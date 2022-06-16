<?php 

namespace Mateodioev\Bots\Telegram;

class Buttons
{
    private array $button = [];

    private string $type;
    private int $line = 0;

    private function __construct(string $type, array $others_params) {
      $this->type = $type;

      if (!empty($others_params)) {
        foreach ($others_params as $i => $value) {
          $this->button[$i] = $value;
        }
      }
    }


    public static function create(string $type = 'inline_keyboard', array $others_params = [])
    {
      return new self($type, $others_params);
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

    public function __toString(): string
    {
      return json_encode($this->button);
    }
}
