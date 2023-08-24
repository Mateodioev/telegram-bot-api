<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Describes the current status of a webhook.
 *
 * @see https://core.telegram.org/bots/api#webhookinfo
 */
class WebhookInfo extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'url'                             => FieldType::single('string'),
            'has_custom_certificate'          => FieldType::single('boolean'),
            'pending_update_count'            => FieldType::single('integer'),
            'ip_address'                      => FieldType::optional('string'),
            'last_error_date'                 => FieldType::optional('integer'),
            'last_error_message'              => FieldType::optional('string'),
            'last_synchronization_error_date' => FieldType::optional('integer'),
            'max_connections'                 => FieldType::optional('integer'),
            'allowed_updates'                 => new FieldType('string', allowArrays: true, allowNull: true, subTypes: []),
        ];
    }
}
