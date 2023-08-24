<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object contains basic information about an invoice.
 *
 * @see https://core.telegram.org/bots/api#invoice
 */
class Invoice extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'title'           => FieldType::single('string'),
            'description'     => FieldType::single('string'),
            'start_parameter' => FieldType::single('string'),
            'currency'        => FieldType::single('string'),
            'total_amount'    => FieldType::single('integer'),
        ];
    }
}
