<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * This object represents one shipping option.
 * 
 * @property string         $id     Shipping option identifier
 * @property string         $title  Option title
 * @property LabeledPrice[] $prices List of price portions
 * 
 * @method string         id()
 * @method string         title()
 * @method LabeledPrice[] prices()
 * 
 * @method static setId(string $id)
 * @method static setTitle(string $title)
 * @method static setPrices(LabeledPrice[] $prices)
 * 
 * @see https://core.telegram.org/bots/api#shippingoption
 */
class ShippingOption extends baseType
{
    protected array $fields = [
        'id' => 'string',
        'title' => 'string',
        'prices' => [LabeledPrice::class],
    ];

    public function get()
    {
        return $this->recursiveGet();
    }
}
