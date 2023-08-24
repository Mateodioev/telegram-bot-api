<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Represents a result of an inline query that was chosen by the user and sent to their chat partner.
 * Note: It is necessary to enable inline feedback via @BotFather in order to receive these objects in updates.
 *
 * @property string $result_id The unique identifier for the result that was chosen
 * @property User $from The user that chose the result
 * @property ?Location $location Optional. Sender location, only for bots that require user location
 * @property ?string $inline_message_id Optional. Identifier of the sent inline message. Available only if there is an inline keyboard attached to the message. Will be also received in callback queries and can be used to edit the message.
 * @property string $query The query that was used to obtain the result
 *
 * @method string resultId()
 * @method User from()
 * @method ?Location location()
 * @method ?string inlineMessageId()
 * @method string query()
 *
 * @method static setResultId(string $resultId)
 * @method static setFrom(User $from)
 * @method static setLocation(?Location $location)
 * @method static setInlineMessageId(?string $inlineMessageId)
 * @method static setQuery(string $query)
 *
 * @see https://core.telegram.org/bots/api#choseninlineresult
 */
class ChosenInlineResult extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'result_id'         => FieldType::single('string'),
            'from'              => FieldType::single(User::class),
            'location'          => FieldType::optional(Location::class),
            'inline_message_id' => FieldType::optional('string'),
            'query'             => FieldType::single('string'),
        ];
    }
}
