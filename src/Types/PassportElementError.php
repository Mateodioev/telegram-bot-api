<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldsStorage;
use Mateodioev\Bots\Telegram\Exception\TelegramParamException;

/**
 * This object represents an error in the Telegram Passport element which was submitted that should be resolved by the user. It should be one of:
 * - PassportElementErrorDataField
 * - PassportElementErrorFrontSide
 * - PassportElementErrorReverseSide
 * - PassportElementErrorSelfie
 * - PassportElementErrorFile
 * - PassportElementErrorFiles
 * - PassportElementErrorTranslationFile
 * - PassportElementErrorTranslationFiles
 * - PassportElementErrorUnspecified
 *
 * @see https://core.telegram.org/bots/api#passportelementerror
 */
class PassportElementError extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }

    public static function childs(): array
    {
        return [
            PassportElementErrorDataField::class,
            PassportElementErrorFrontSide::class,
            PassportElementErrorReverseSide::class,
            PassportElementErrorSelfie::class,
            PassportElementErrorFile::class,
            PassportElementErrorFiles::class,
            PassportElementErrorTranslationFile::class,
            PassportElementErrorTranslationFiles::class,
            PassportElementErrorUnspecified::class,
        ];
    }

    public static function selectChild(array $update): string
    {
        if (isset($update['source']) === false) {
            throw new TelegramParamException('Missing source field in PassportElementError');
        }

        return match ($update['source']) {
            'data'              => PassportElementErrorDataField::class,
            'front_side'        => PassportElementErrorFrontSide::class,
            'reverse_side'      => PassportElementErrorReverseSide::class,
            'selfie'            => PassportElementErrorSelfie::class,
            'file'              => PassportElementErrorFile::class,
            'files'             => PassportElementErrorFiles::class,
            'translation_file'  => PassportElementErrorTranslationFile::class,
            'translation_files' => PassportElementErrorTranslationFiles::class,
            'unspecified'       => PassportElementErrorUnspecified::class,
            default             => throw new TelegramParamException('Invalid source: ' . $update['source'] . ' in PassportElementError')
        };
    }
}
