<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * This object contains information about a chat boost.
 *
 * @property string $boost_id Unique identifier of the boost
 * @property int $add_date Point in time (Unix timestamp) when the chat was boosted
 * @property int $expiration_date Point in time (Unix timestamp) when the boost will automatically expire, unless the booster's Telegram Premium subscription is prolonged
 * @property ChatBoostSource $source Source of the added boost
 *
 * @method string boostId()
 * @method int addDate()
 * @method int expirationDate()
 * @method ChatBoostSource source()
 *
 * @method static setBoostId(string $boostId)
 * @method static setAddDate(int $addDate)
 * @method static setExpirationDate(int $expirationDate)
 * @method static setSource(ChatBoostSource $source)
 *
 * @see https://core.telegram.org/bots/api#chatboost
 */
class ChatBoost extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'boost_id'        => FieldType::single('string'),
            'add_date'        => FieldType::single('integer'),
            'expiration_date' => FieldType::single('integer'),
            'source'          => FieldType::single(ChatBoostSource::class),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
