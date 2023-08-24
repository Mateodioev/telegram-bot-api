<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents a portion of the price for goods or services.
 *
 * @see https://core.telegram.org/bots/api#labeledprice
 */
class LabeledPrice extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'label'  => FieldType::single('string'),
            'amount' => FieldType::single('integer'),
        ];
    }
}
