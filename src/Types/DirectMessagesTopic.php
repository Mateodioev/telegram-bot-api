<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Describes a topic of a direct messages chat.
 *
 * @property int $topic_id Unique identifier of the topic
 * @property User|null $user Optional. Information about the user that created the topic. Currently, it is always present
 *
 * @method int topicId()
 * @method User|null user()
 *
 * @method static setTopicId(int $topicId)
 * @method static setUser(User|null $user)
 *
 * @see https://core.telegram.org/bots/api#directmessagestopic
 */
class DirectMessagesTopic extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'topic_id' => FieldType::single('integer'),
            'user'     => FieldType::optional(User::class),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
