<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents one row of the high scores table for a game.
 *
 * @property int $position Position in high score table for the game
 * @property User $user User
 * @property int $score Score
 *
 * @method int position()
 * @method User user()
 * @method int score()
 *
 * @method static setPosition(int $position)
 * @method static setUser(User $user)
 * @method static setScore(int $score)
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
