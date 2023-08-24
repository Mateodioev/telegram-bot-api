<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Describes the current status of a webhook.
 *
 * @property string $url Webhook URL, may be empty if webhook is not set up
 * @property bool $has_custom_certificate True, if a custom certificate was provided for webhook certificate checks
 * @property int $pending_update_count Number of updates awaiting delivery
 * @property ?string $ip_address Optional. Currently used webhook IP address
 * @property ?int $last_error_date Optional. Unix time for the most recent error that happened when trying to deliver an update via webhook
 * @property ?string $last_error_message Optional. Error message in human-readable format for the most recent error that happened when trying to deliver an update via webhook
 * @property ?int $last_synchronization_error_date Optional. Unix time of the most recent error that happened when trying to synchronize available updates with Telegram datacenters
 * @property ?int $max_connections Optional. The maximum allowed number of simultaneous HTTPS connections to the webhook for update delivery
 * @property ?string[] $allowed_updates Optional. A list of update types the bot is subscribed to. Defaults to all update types except chat_member
 *
 * @method string url()
 * @method bool hasCustomCertificate()
 * @method int pendingUpdateCount()
 * @method ?string ipAddress()
 * @method ?int lastErrorDate()
 * @method ?string lastErrorMessage()
 * @method ?int lastSynchronizationErrorDate()
 * @method ?int maxConnections()
 * @method ?string[] allowedUpdates()
 *
 * @method static setUrl(string $url)
 * @method static setHasCustomCertificate(bool $hasCustomCertificate)
 * @method static setPendingUpdateCount(int $pendingUpdateCount)
 * @method static setIpAddress(?string $ipAddress)
 * @method static setLastErrorDate(?int $lastErrorDate)
 * @method static setLastErrorMessage(?string $lastErrorMessage)
 * @method static setLastSynchronizationErrorDate(?int $lastSynchronizationErrorDate)
 * @method static setMaxConnections(?int $maxConnections)
 * @method static setAllowedUpdates(?string[] $allowedUpdates)
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
