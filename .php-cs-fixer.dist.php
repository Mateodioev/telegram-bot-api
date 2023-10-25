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
        'single_import_per_statement' => false,
        'single_blank_line_at_eof' => true,
        'blank_lines_before_namespace' => true,
        'single_line_after_imports' => true,
        'no_unused_imports' => true,
    ])
    ->setFinder($finder)
;
