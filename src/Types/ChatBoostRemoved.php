<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * This object represents a boost removed from a chat.
 *
 * @property Chat $chat Chat which was boosted
 * @property string $boost_id Unique identifier of the boost
 * @property int $remove_date Point in time (Unix timestamp) when the boost was removed
 * @property ChatBoostSource $source Source of the removed boost
 *
 * @method Chat chat()
 * @method string boostId()
 * @method int removeDate()
 * @method ChatBoostSource source()
 *
 * @method static setChat(Chat $chat)
 * @method static setBoostId(string $boostId)
 * @method static setRemoveDate(int $removeDate)
 * @method static setSource(ChatBoostSource $source)
 *
 * @see https://core.telegram.org/bots/api#chatboostremoved
 */
class ChatBoostRemoved extends abstractType
{
    public function __construct(
        Chat $chat,
        string $boost_id,
        int $remove_date,
        ChatBoostSource $source,
    ) {
        parent::__construct([
            'chat'        => $chat,
            'boost_id'    => $boost_id,
            'remove_date' => $remove_date,
            'source'      => $source,
        ]);
    }

    protected function boot(): void
    {
        $this->fields = [
            'chat'        => FieldType::single(Chat::class),
            'boost_id'    => FieldType::single('string'),
            'remove_date' => FieldType::single('integer'),
            'source'      => FieldType::single(ChatBoostSource::class),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
