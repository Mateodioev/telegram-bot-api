<?php

use Tools\Gen\{Schema, TypeStr};

require __DIR__ . '/../vendor/autoload.php';

$schema = new Schema();

foreach ($schema->types() as $name => $type) {
    file_put_contents(__DIR__ . '/../src/Types/' . $name . '.php', (string) new TypeStr($type));
}
