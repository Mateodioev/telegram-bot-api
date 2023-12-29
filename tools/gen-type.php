<?php

use Tools\Gen\{Schema, TypeStr};

require __DIR__ . '/../vendor/autoload.php';

$schema = new Schema();

foreach ($schema->types() as $name => $type) {
    $fileName = __DIR__ . '/../src/Types/' . $name . '.php';

    file_put_contents($fileName, (string) new TypeStr($type));
    echo "Generated $fileName\n";
}
