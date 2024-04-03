<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * The reaction is based on an emoji.
 *
 * @property string $type Type of the reaction, always "emoji"
 * @property string $emoji Reaction emoji. Currently, it can be one of "👍", "👎", "❤", "🔥", "🥰", "👏", "😁", "🤔", "🤯", "😱", "🤬", "😢", "🎉", "🤩", "🤮", "💩", "🙏", "👌", "🕊", "🤡", "🥱", "🥴", "😍", "🐳", "❤‍🔥", "🌚", "🌭", "💯", "🤣", "⚡", "🍌", "🏆", "💔", "🤨", "😐", "🍓", "🍾", "💋", "🖕", "😈", "😴", "😭", "🤓", "👻", "👨‍💻", "👀", "🎃", "🙈", "😇", "😨", "🤝", "✍", "🤗", "🫡", "🎅", "🎄", "☃", "💅", "🤪", "🗿", "🆒", "💘", "🙉", "🦄", "😘", "💊", "🙊", "😎", "👾", "🤷‍♂", "🤷", "🤷‍♀", "😡"
 *
 * @method string type()
 * @method string emoji()
 *
 * @method static setType(string $type)
 * @method static setEmoji(string $emoji)
 *
 * @see https://core.telegram.org/bots/api#reactiontypeemoji
 */
class ReactionTypeEmoji extends ReactionType
{
    protected function boot(): void
    {
        $this->fields = [
            'type'  => FieldType::single('string'),
            'emoji' => FieldType::single('string'),
        ];
    }
}
