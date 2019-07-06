<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitee64b1f52d278c3b544ef136e6be7637
{
    public static $files = array (
        '320cde22f66dd4f5d3fd621d3e88b98f' => __DIR__ . '/..' . '/symfony/polyfill-ctype/bootstrap.php',
        'de115f95ba3b622fd8c9ca2baddc5afc' => __DIR__ . '/../..' . '/inc/Helpers.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Polyfill\\Ctype\\' => 23,
        ),
        'D' => 
        array (
            'Dotenv\\' => 7,
            'Dealerdirect\\Composer\\Plugin\\Installers\\PHPCodeSniffer\\' => 55,
        ),
        'A' => 
        array (
            'Awps\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Polyfill\\Ctype\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-ctype',
        ),
        'Dotenv\\' => 
        array (
            0 => __DIR__ . '/..' . '/vlucas/phpdotenv/src',
        ),
        'Dealerdirect\\Composer\\Plugin\\Installers\\PHPCodeSniffer\\' => 
        array (
            0 => __DIR__ . '/..' . '/dealerdirect/phpcodesniffer-composer-installer/src',
        ),
        'Awps\\' => 
        array (
            0 => __DIR__ . '/../..' . '/inc',
        ),
    );

    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'PhpOption\\' => 
            array (
                0 => __DIR__ . '/..' . '/phpoption/phpoption/src',
            ),
        ),
    );

    public static $classMap = array (
        'ExampleClass' => __DIR__ . '/..' . '/jakub-onderka/php-parallel-lint/tests/skip-on-5.3/class.php',
        'ExampleTrait' => __DIR__ . '/..' . '/jakub-onderka/php-parallel-lint/tests/skip-on-5.3/trait.php',
        'JakubOnderka\\PhpParallelLint\\ArrayIterator' => __DIR__ . '/..' . '/jakub-onderka/php-parallel-lint/src/Settings.php',
        'JakubOnderka\\PhpParallelLint\\Blame' => __DIR__ . '/..' . '/jakub-onderka/php-parallel-lint/src/Error.php',
        'JakubOnderka\\PhpParallelLint\\ConsoleWriter' => __DIR__ . '/..' . '/jakub-onderka/php-parallel-lint/src/Output.php',
        'JakubOnderka\\PhpParallelLint\\Error' => __DIR__ . '/..' . '/jakub-onderka/php-parallel-lint/src/Error.php',
        'JakubOnderka\\PhpParallelLint\\ErrorFormatter' => __DIR__ . '/..' . '/jakub-onderka/php-parallel-lint/src/ErrorFormatter.php',
        'JakubOnderka\\PhpParallelLint\\Exception' => __DIR__ . '/..' . '/jakub-onderka/php-parallel-lint/src/exceptions.php',
        'JakubOnderka\\PhpParallelLint\\FileWriter' => __DIR__ . '/..' . '/jakub-onderka/php-parallel-lint/src/Output.php',
        'JakubOnderka\\PhpParallelLint\\IWriter' => __DIR__ . '/..' . '/jakub-onderka/php-parallel-lint/src/Output.php',
        'JakubOnderka\\PhpParallelLint\\InvalidArgumentException' => __DIR__ . '/..' . '/jakub-onderka/php-parallel-lint/src/exceptions.php',
        'JakubOnderka\\PhpParallelLint\\JsonOutput' => __DIR__ . '/..' . '/jakub-onderka/php-parallel-lint/src/Output.php',
        'JakubOnderka\\PhpParallelLint\\Manager' => __DIR__ . '/..' . '/jakub-onderka/php-parallel-lint/src/Manager.php',
        'JakubOnderka\\PhpParallelLint\\MultipleWriter' => __DIR__ . '/..' . '/jakub-onderka/php-parallel-lint/src/Output.php',
        'JakubOnderka\\PhpParallelLint\\NotExistsPathException' => __DIR__ . '/..' . '/jakub-onderka/php-parallel-lint/src/exceptions.php',
        'JakubOnderka\\PhpParallelLint\\NullWriter' => __DIR__ . '/..' . '/jakub-onderka/php-parallel-lint/src/Output.php',
        'JakubOnderka\\PhpParallelLint\\Output' => __DIR__ . '/..' . '/jakub-onderka/php-parallel-lint/src/Output.php',
        'JakubOnderka\\PhpParallelLint\\ParallelLint' => __DIR__ . '/..' . '/jakub-onderka/php-parallel-lint/src/ParallelLint.php',
        'JakubOnderka\\PhpParallelLint\\Process\\GitBlameProcess' => __DIR__ . '/..' . '/jakub-onderka/php-parallel-lint/src/Process/GitBlameProcess.php',
        'JakubOnderka\\PhpParallelLint\\Process\\LintProcess' => __DIR__ . '/..' . '/jakub-onderka/php-parallel-lint/src/Process/LintProcess.php',
        'JakubOnderka\\PhpParallelLint\\Process\\PhpExecutable' => __DIR__ . '/..' . '/jakub-onderka/php-parallel-lint/src/Process/PhpExecutable.php',
        'JakubOnderka\\PhpParallelLint\\Process\\PhpProcess' => __DIR__ . '/..' . '/jakub-onderka/php-parallel-lint/src/Process/PhpProcess.php',
        'JakubOnderka\\PhpParallelLint\\Process\\Process' => __DIR__ . '/..' . '/jakub-onderka/php-parallel-lint/src/Process/Process.php',
        'JakubOnderka\\PhpParallelLint\\Process\\SkipLintProcess' => __DIR__ . '/..' . '/jakub-onderka/php-parallel-lint/src/Process/SkipLintProcess.php',
        'JakubOnderka\\PhpParallelLint\\RecursiveDirectoryFilterIterator' => __DIR__ . '/..' . '/jakub-onderka/php-parallel-lint/src/Manager.php',
        'JakubOnderka\\PhpParallelLint\\Result' => __DIR__ . '/..' . '/jakub-onderka/php-parallel-lint/src/Result.php',
        'JakubOnderka\\PhpParallelLint\\RunTimeException' => __DIR__ . '/..' . '/jakub-onderka/php-parallel-lint/src/exceptions.php',
        'JakubOnderka\\PhpParallelLint\\Settings' => __DIR__ . '/..' . '/jakub-onderka/php-parallel-lint/src/Settings.php',
        'JakubOnderka\\PhpParallelLint\\SyntaxError' => __DIR__ . '/..' . '/jakub-onderka/php-parallel-lint/src/Error.php',
        'JakubOnderka\\PhpParallelLint\\TextOutput' => __DIR__ . '/..' . '/jakub-onderka/php-parallel-lint/src/Output.php',
        'JakubOnderka\\PhpParallelLint\\TextOutputColored' => __DIR__ . '/..' . '/jakub-onderka/php-parallel-lint/src/Output.php',
        'JsonSerializable' => __DIR__ . '/..' . '/jakub-onderka/php-parallel-lint/src/JsonSerializable.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitee64b1f52d278c3b544ef136e6be7637::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitee64b1f52d278c3b544ef136e6be7637::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitee64b1f52d278c3b544ef136e6be7637::$prefixesPsr0;
            $loader->classMap = ComposerStaticInitee64b1f52d278c3b544ef136e6be7637::$classMap;

        }, null, ClassLoader::class);
    }
}
