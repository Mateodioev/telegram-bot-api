<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Contains information about the start page settings of a Telegram Business account.
 *
 * @property string|null $title Optional. Title text of the business intro
 * @property string|null $message Optional. Message text of the business intro
 * @property Sticker|null $sticker Optional. Sticker of the business intro
 *
 * @method string|null title()
 * @method string|null message()
 * @method Sticker|null sticker()
 *
 * @method static setTitle(string|null $title)
 * @method static setMessage(string|null $message)
 * @method static setSticker(Sticker|null $sticker)
 *
 * @see https://core.telegram.org/bots/api#businessintro
 */
class BusinessIntro extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'title'   => FieldType::optional('string'),
            'message' => FieldType::optional('string'),
            'sticker' => FieldType::optional(Sticker::class),
        ];
    }
}
