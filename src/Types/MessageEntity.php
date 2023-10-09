<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents one special entity in a text message. For example, hashtags, usernames, URLs, etc.
 *
 * @property string $type Type of the entity. Currently, can be "mention" (@username), "hashtag" (#hashtag), "cashtag" ($USD), "bot_command" (/start@jobs_bot), "url" (https://telegram.org), "email" (do-not-reply@telegram.org), "phone_number" (+1-212-555-0123), "bold" (bold text), "italic" (italic text), "underline" (underlined text), "strikethrough" (strikethrough text), "spoiler" (spoiler message), "code" (monowidth string), "pre" (monowidth block), "text_link" (for clickable text URLs), "text_mention" (for users without usernames), "custom_emoji" (for inline custom emoji stickers)
 * @property int $offset Offset in UTF-16 code units to the start of the entity
 * @property int $length Length of the entity in UTF-16 code units
 * @property string|null $url Optional. For "text_link" only, URL that will be opened after user taps on the text
 * @property User|null $user Optional. For "text_mention" only, the mentioned user
 * @property string|null $language Optional. For "pre" only, the programming language of the entity text
 * @property string|null $custom_emoji_id Optional. For "custom_emoji" only, unique identifier of the custom emoji. Use getCustomEmojiStickers to get full information about the sticker
 *
 * @method string type()
 * @method int offset()
 * @method int length()
 * @method string|null url()
 * @method User|null user()
 * @method string|null language()
 * @method string|null customEmojiId()
 *
 * @method static setType(string $type)
 * @method static setOffset(int $offset)
 * @method static setLength(int $length)
 * @method static setUrl(string|null $url)
 * @method static setUser(User|null $user)
 * @method static setLanguage(string|null $language)
 * @method static setCustomEmojiId(string|null $customEmojiId)
 *
 * @see https://core.telegram.org/bots/api#messageentity
 */
class MessageEntity extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'type'            => FieldType::single('string'),
            'offset'          => FieldType::single('integer'),
            'length'          => FieldType::single('integer'),
            'url'             => FieldType::optional('string'),
            'user'            => FieldType::optional(User::class),
            'language'        => FieldType::optional('string'),
            'custom_emoji_id' => FieldType::optional('string'),
        ];
    }
}
