<?php

namespace Tools\Gen;

use Mateodioev\Bots\Telegram\Exception\TelegramParamException;

final class Schema
{
    public const JSON_SCHEMA = 'https://raw.githubusercontent.com/PaulSonOfLars/telegram-bot-api-spec/main/api.json';

    private array $json;
    private array $ignoreTypes = [
        'InputFile',
        'ReplyKeyboardMarkup',
        'InlineKeyboardMarkup',
    ];

    public function __construct()
    {
        $this->fetch();
    }

    public function version(): string
    {
        return $this->json['version'];
    }

    public function releaseDate(): string
    {
        return $this->json['release_date'];
    }

    public function changeLog(): string
    {
        return $this->json['changelog'];
    }

    /**
     * @return Types[]
     */
    public function types(): array
    {
        foreach ($this->ignoreTypes as $ignored) {
            unset($this->json['types'][$ignored]);
        }

        $builder = static fn (array $type): Types => new Types(
            $type['name'],
            $type['href'], // Link to bot api docs
            $type['description'] ?? [], // Description
            $type['fields'] ?? [], // Type properties
            $type['subtypes'] ?? null, // Child classes
            $type['subtype_of'] ?? null, // Parent class
        );

        return array_map($builder, $this->json['types']);
    }

    /**
     * @return string[]
     */
    public function missingTypes(): array
    {
        foreach ($this->ignoreTypes as $ignored) {
            unset($this->json['types'][$ignored]);
        }

        $missing = [];
        foreach ($this->json['types'] as $type) {
            try {
                new Types(
                    $type['name'],
                    $type['href'], // Link to bot api docs
                    $type['description'] ?? [], // Description
                    $type['fields'] ?? [], // Type properties
                    $type['subtypes'] ?? null, // Child classes
                    $type['subtype_of'] ?? null, // Parent class
                );
            } catch (TelegramParamException $e) {
                if (str_starts_with($e->getMessage(), 'Invalid type')) {
                    $missing[] = str_replace('Invalid type ', '', $e->getMessage());
                }
            }
        }

        return $missing;
    }

    /**
     * @return Method[]
     */
    public function methods(): array
    {
        $builder = static fn (array $method): Method => new Method(
            $method['name'],
            $method['href'],
            $method['description'],
            $method['fields'] ?? [],
        );

        return array_map($builder, $this->json['methods']);
    }

    /**
     * Fetch the JSON schema
     */
    private function fetch(): void
    {
        $content    = file_get_contents(self::JSON_SCHEMA);
        $this->json = json_decode($content, true, flags: JSON_THROW_ON_ERROR);
    }
}
