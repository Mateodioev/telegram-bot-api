<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * This object represents a change of a reaction on a message performed by a user.
 *
 * @property Chat $chat The chat containing the message the user reacted to
 * @property int $message_id Unique identifier of the message inside the chat
 * @property User|null $user Optional. The user that changed the reaction, if the user isn't anonymous
 * @property Chat|null $actor_chat Optional. The chat on behalf of which the reaction was changed, if the user is anonymous
 * @property int $date Date of the change in Unix time
 * @property ReactionType[] $old_reaction Previous list of reaction types that were set by the user
 * @property ReactionType[] $new_reaction New list of reaction types that have been set by the user
 *
 * @method Chat chat()
 * @method int messageId()
 * @method User|null user()
 * @method Chat|null actorChat()
 * @method int date()
 * @method ReactionType[] oldReaction()
 * @method ReactionType[] newReaction()
 *
 * @method static setChat(Chat $chat)
 * @method static setMessageId(int $messageId)
 * @method static setUser(User|null $user)
 * @method static setActorChat(Chat|null $actorChat)
 * @method static setDate(int $date)
 * @method static setOldReaction(ReactionType[] $oldReaction)
 * @method static setNewReaction(ReactionType[] $newReaction)
 *
 * @see https://core.telegram.org/bots/api#messagereactionupdated
 */
class MessageReactionUpdated extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'chat'         => FieldType::single(Chat::class),
            'message_id'   => FieldType::single('integer'),
            'user'         => FieldType::optional(User::class),
            'actor_chat'   => FieldType::optional(Chat::class),
            'date'         => FieldType::single('integer'),
            'old_reaction' => FieldType::multiple(ReactionType::class),
            'new_reaction' => FieldType::multiple(ReactionType::class),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
