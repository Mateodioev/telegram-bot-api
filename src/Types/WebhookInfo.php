<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Describes the current status of a webhook.
 *
 * @property string $url Webhook URL, may be empty if webhook is not set up
 * @property bool $has_custom_certificate True, if a custom certificate was provided for webhook certificate checks
 * @property int $pending_update_count Number of updates awaiting delivery
 * @property string|null $ip_address Optional. Currently used webhook IP address
 * @property int|null $last_error_date Optional. Unix time for the most recent error that happened when trying to deliver an update via webhook
 * @property string|null $last_error_message Optional. Error message in human-readable format for the most recent error that happened when trying to deliver an update via webhook
 * @property int|null $last_synchronization_error_date Optional. Unix time of the most recent error that happened when trying to synchronize available updates with Telegram datacenters
 * @property int|null $max_connections Optional. The maximum allowed number of simultaneous HTTPS connections to the webhook for update delivery
 * @property string[]|null $allowed_updates Optional. A list of update types the bot is subscribed to. Defaults to all update types except chat_member
 *
 * @method string url()
 * @method bool hasCustomCertificate()
 * @method int pendingUpdateCount()
 * @method string|null ipAddress()
 * @method int|null lastErrorDate()
 * @method string|null lastErrorMessage()
 * @method int|null lastSynchronizationErrorDate()
 * @method int|null maxConnections()
 * @method string[]|null allowedUpdates()
 *
 * @method static setUrl(string $url)
 * @method static setHasCustomCertificate(bool $hasCustomCertificate)
 * @method static setPendingUpdateCount(int $pendingUpdateCount)
 * @method static setIpAddress(string|null $ipAddress)
 * @method static setLastErrorDate(int|null $lastErrorDate)
 * @method static setLastErrorMessage(string|null $lastErrorMessage)
 * @method static setLastSynchronizationErrorDate(int|null $lastSynchronizationErrorDate)
 * @method static setMaxConnections(int|null $maxConnections)
 * @method static setAllowedUpdates(string[]|null $allowedUpdates)
 *
 * @see https://core.telegram.org/bots/api#webhookinfo
 */
class WebhookInfo extends abstractType
{
    public function __construct(
        string $url,
        bool $has_custom_certificate,
        int $pending_update_count,
        ?string $ip_address = null,
        ?int $last_error_date = null,
        ?string $last_error_message = null,
        ?int $last_synchronization_error_date = null,
        ?int $max_connections = null,
        ?array $allowed_updates = null,
    ) {
        parent::__construct([
            'url'                             => $url,
            'has_custom_certificate'          => $has_custom_certificate,
            'pending_update_count'            => $pending_update_count,
            'ip_address'                      => $ip_address,
            'last_error_date'                 => $last_error_date,
            'last_error_message'              => $last_error_message,
            'last_synchronization_error_date' => $last_synchronization_error_date,
            'max_connections'                 => $max_connections,
            'allowed_updates'                 => $allowed_updates,
        ]);
    }

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
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
