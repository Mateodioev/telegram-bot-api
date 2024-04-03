<?php

use Tools\Gen\{Schema, TypeStr};

require __DIR__ . '/../vendor/autoload.php';

$command = $argv[1] ?? null;

if ($command === 'missing-types') {
    $types = (new Schema())->missingTypes();
    echo implode("\n", $types);
    return;
}

$schema = new Schema();

foreach ($schema->types() as $name => $type) {
    $fileName = __DIR__ . '/../src/Types/' . $name . '.php';

    file_put_contents($fileName, (string) new TypeStr($type));
    echo "Generated $fileName\n";
}
