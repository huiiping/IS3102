<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb936545d50e6958c275b5e4c9afeb0d5
{
    public static $files = array (
        '34122c0574b76bf21c9a8db62b5b9cf3' => __DIR__ . '/..' . '/cakephp/chronos/src/carbon_compat.php',
        'c964ee0ededf28c96ebd9db5099ef910' => __DIR__ . '/..' . '/guzzlehttp/promises/src/functions_include.php',
        'a0edc8309cc5e1d60e3047b5df6b7052' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/functions_include.php',
        'c720f792236cd163ece8049879166850' => __DIR__ . '/..' . '/cakephp/cakephp/src/Core/functions.php',
        'ede59e3a405fb689cd1cebb7bb1db3fb' => __DIR__ . '/..' . '/cakephp/cakephp/src/Collection/functions.php',
        '90236b492da7ca2983a2ad6e33e4152e' => __DIR__ . '/..' . '/cakephp/cakephp/src/I18n/functions.php',
        'b1fc73705e1bec51cd2b20a32cf1c60a' => __DIR__ . '/..' . '/cakephp/cakephp/src/Utility/bootstrap.php',
        '37a3dc5111fe8f707ab4c132ef1dbc62' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/functions_include.php',
    );

    public static $prefixLengthsPsr4 = array (
        'Z' => 
        array (
            'Zend\\Diactoros\\' => 15,
        ),
        'P' => 
        array (
            'Psr\\Log\\' => 8,
            'Psr\\Http\\Message\\' => 17,
        ),
        'G' => 
        array (
            'GuzzleHttp\\Psr7\\' => 16,
            'GuzzleHttp\\Promise\\' => 19,
            'GuzzleHttp\\' => 11,
        ),
        'F' => 
        array (
            'FontLib\\' => 8,
        ),
        'D' => 
        array (
            'Dompdf\\' => 7,
        ),
        'C' => 
        array (
            'CsvView\\' => 8,
            'Cake\\Chronos\\' => 13,
            'Cake\\' => 5,
        ),
        'A' => 
        array (
            'Aura\\Intl\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Zend\\Diactoros\\' => 
        array (
            0 => __DIR__ . '/..' . '/zendframework/zend-diactoros/src',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'Psr\\Http\\Message\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/http-message/src',
        ),
        'GuzzleHttp\\Psr7\\' => 
        array (
            0 => __DIR__ . '/..' . '/guzzlehttp/psr7/src',
        ),
        'GuzzleHttp\\Promise\\' => 
        array (
            0 => __DIR__ . '/..' . '/guzzlehttp/promises/src',
        ),
        'GuzzleHttp\\' => 
        array (
            0 => __DIR__ . '/..' . '/guzzlehttp/guzzle/src',
        ),
        'FontLib\\' => 
        array (
            0 => __DIR__ . '/..' . '/phenx/php-font-lib/src/FontLib',
        ),
        'Dompdf\\' => 
        array (
            0 => __DIR__ . '/..' . '/dompdf/dompdf/src',
        ),
        'CsvView\\' => 
        array (
            0 => __DIR__ . '/..' . '/friendsofcake/cakephp-csvview/src',
        ),
        'Cake\\Chronos\\' => 
        array (
            0 => __DIR__ . '/..' . '/cakephp/chronos/src',
        ),
        'Cake\\' => 
        array (
            0 => __DIR__ . '/..' . '/cakephp/cakephp/src',
        ),
        'Aura\\Intl\\' => 
        array (
            0 => __DIR__ . '/..' . '/aura/intl/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'S' => 
        array (
            'Svg\\' => 
            array (
                0 => __DIR__ . '/..' . '/phenx/php-svg-lib/src',
            ),
            'Sabberworm\\CSS' => 
            array (
                0 => __DIR__ . '/..' . '/sabberworm/php-css-parser/lib',
            ),
        ),
        'P' => 
        array (
            'PHPExcel' => 
            array (
                0 => __DIR__ . '/..' . '/phpoffice/phpexcel/Classes',
            ),
        ),
        'M' => 
        array (
            'Mailjet' => 
            array (
                0 => __DIR__ . '/..' . '/mailjet/mailjet-apiv3-php/src',
            ),
        ),
    );

    public static $classMap = array (
        'Cpdf' => __DIR__ . '/..' . '/dompdf/dompdf/lib/Cpdf.php',
        'HTML5_Data' => __DIR__ . '/..' . '/dompdf/dompdf/lib/html5lib/Data.php',
        'HTML5_InputStream' => __DIR__ . '/..' . '/dompdf/dompdf/lib/html5lib/InputStream.php',
        'HTML5_Parser' => __DIR__ . '/..' . '/dompdf/dompdf/lib/html5lib/Parser.php',
        'HTML5_Tokenizer' => __DIR__ . '/..' . '/dompdf/dompdf/lib/html5lib/Tokenizer.php',
        'HTML5_TreeBuilder' => __DIR__ . '/..' . '/dompdf/dompdf/lib/html5lib/TreeBuilder.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb936545d50e6958c275b5e4c9afeb0d5::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb936545d50e6958c275b5e4c9afeb0d5::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitb936545d50e6958c275b5e4c9afeb0d5::$prefixesPsr0;
            $loader->classMap = ComposerStaticInitb936545d50e6958c275b5e4c9afeb0d5::$classMap;

        }, null, ClassLoader::class);
    }
}
