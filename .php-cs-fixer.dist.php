<?php

$finder = PhpCsFixer\Finder::create()
    ->ignoreDotFiles(true)
    ->in(__DIR__);

$config = new PhpCsFixer\Config();

return $config->setRules([
        '@PSR12' => true,
        'array_syntax' => ['syntax' => 'short'],
        'assign_null_coalescing_to_coalesce_equal' => true,
        'concat_space' => ['spacing' => 'one'],
        'single_import_per_statement' => ['group_to_single_imports' => false],
    ])
    ->setFinder($finder)
;
