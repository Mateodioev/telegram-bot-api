<?php

namespace Tools\Gen;

use function in_array;

class Types
{
    use phpDocDescription;
    use fieldGen;

    /**
     * @param Field[] $fields
     */
    public function __construct(
        public string $name,
        public string $link,
        public array $description = [],
        public array $fields      = [],
        public ?array $subtypes   = null,
        public ?array $subtypeOf  = null,
    ) {
        $this->fields = array_map(
            fn ($field) => new Field(
                $field['name'],
                $field['types'],
                $field['required'],
                $field['description']
            ),
            $this->fields,
        );
    }

    public function hasSubTypes(): bool
    {
        return $this->subtypes !== null;
    }

    public function isSubTypeOf(string $type): bool
    {
        return $this->subtypeOf !== null && in_array($type, $this->subtypeOf);
    }
}
