<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * This object represents one special entity in a text message. For example, hashtags, usernames, URLs, etc.
 * 
 * @property string   $type            Type of the entity. Currently, can be “mention” (`@username`), “hashtag” (`#hashtag`), “cashtag” (`$USD`), “bot_command” (`/start@jobs_bot`), “url” (`https://telegram.org`), “email” (`do-not-reply@telegram.org`), “phone_number” (`+1-212-555-0123`), “bold” (*bold text*), “italic” (_italic text_), “underline” (underlined text), “strikethrough” (strikethrough text), “spoiler” (spoiler message), “code” (monowidth string), “pre” (monowidth block), “text_link” (for clickable text URLs), “text_mention” (for users without usernames), “custom_emoji” (for inline custom emoji stickers)
 * @property integer  $offset          Offset in [UTF-16 code units](https://core.telegram.org/api/entities#entity-length) to the start of the entity
 * @property integer  $length          Length of the entity in [UTF-16 code units](https://core.telegram.org/api/entities#entity-length)
 * @property ?string  $url             Optional. For “text_link” only, URL that will be opened after user taps on the text
 * @property ?User    $user            Optional. For “text_mention” only, the mentioned user
 * @property ?string  $language        Optional. For “pre” only, the programming language of the entity text
 * @property ?string  $custom_emoji_id Optional. For “custom_emoji” only, unique identifier of the custom emoji. Use [getCustomEmojiStickers](https://core.telegram.org/bots/api#getcustomemojistickers) to get full information about the sticker
 * 
 * @method string   type()
 * @method integer  offset()
 * @method integer  length()
 * @method ?string  url()
 * @method ?User    user()
 * @method ?string  language()
 * @method ?string  customEmojiId()
 * 
 * @method static setType(string $type)
 * @method static setOffset(integer $offset)
 * @method static setLength(integer $length)
 * @method static setUrl(string $url)
 * @method static setUser(User $user)
 * @method static setLanguage(string $language)
 * @method static setCustomEmojiId(string $customEmojiId)
 * 
 * @see https://core.telegram.org/bots/api#messageentity
 */
class MessageEntity extends baseType
{
    protected array $fields = [
        'type'            => 'string',
        'offset'          => 'integer',
        'length'          => 'integer',
        'url'             => 'string',
        'user'            => User::class,
        'language'        => 'string',
        'custom_emoji_id' => 'string',
    ];
}
