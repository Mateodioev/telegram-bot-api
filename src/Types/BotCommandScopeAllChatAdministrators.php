<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Represents the scope of bot commands, covering all group and supergroup chat administrators.
 *
 * @property string $type Scope type, must be all_chat_administrators
 *
 * @method string type()
 *
 * @method static setType(string $type)
 *
 * @see https://core.telegram.org/bots/api#botcommandscopeallchatadministrators
 */
class BotCommandScopeAllChatAdministrators extends BotCommandScope
{
    public const TYPE = 'all_chat_administrators';

    public function __construct()
    {
        parent::__construct([
            'type' => self::TYPE,
        ]);
    }

    protected function boot(): void
    {
        $this->fields = [
            'type' => FieldType::single('string'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
