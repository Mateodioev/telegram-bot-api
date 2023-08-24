<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents one row of the high scores table for a game.
 *
 * @see https://core.telegram.org/bots/api#gamehighscore
 */
class GameHighScore extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'position' => FieldType::single('integer'),
            'user'     => FieldType::single(User::class),
            'score'    => FieldType::single('integer'),
        ];
    }
}
