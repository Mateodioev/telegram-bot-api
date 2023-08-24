<?php

namespace Tools\Gen;

class Method
{
    use phpDocDescription;
    use fieldGen;

    public function __construct(
        public string $name,
        public string $link,
        public array $description = [],
        public array $fields      = [],
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
}
