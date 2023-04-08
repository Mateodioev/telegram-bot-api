<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * Represents a result of an inline query that was chosen by the user and sent to their chat partner.
 * 
 * @property string    $result_id The unique identifier for the result that was chosen
 * @property User      $from The user that chose the result
 * @property ?Location $location Optional. Sender location, only for bots that require user location
 * @property ?string   $inline_message_id Optional. Identifier of the sent inline message. Available only if there is an [inline keyboard](https://core.telegram.org/bots/api#inlinekeyboardmarkup) attached to the message. Will be also received in [callback queries](https://core.telegram.org/bots/api#callbackquery) and can be used to [edit](https://core.telegram.org/bots/api#updating-messages) the message.
 * @property string    $query The query that was used to obtain the result
 * 
 * @method string    resultId()
 * @method User      from()
 * @method ?Location location()
 * @method ?string   inlineMessageId()
 * @method string    query()
 * 
 * @method static setResultId(string $resultId)
 * @method static setFrom(User $from)
 * @method static setLocation(Location $location)
 * @method static setInlineMessageId(string $inlineMessageId)
 * @method static setQuery(string $query)
 * 
 * @see https://core.telegram.org/bots/api#choseninlineresult
 */
class ChosenInlineResult extends baseType
{
    protected array $fields = [
        'result_id'         => 'string',
        'from'              => User::class,
        'location'          => Location::class,
        'inline_message_id' => 'string',
        'query'             => 'string',
    ];
}
