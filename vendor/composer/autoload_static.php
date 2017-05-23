<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6e75602423c8ccaa9d35409328c36b72
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'League\\HTMLToMarkdown\\' => 22,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'League\\HTMLToMarkdown\\' => 
        array (
            0 => __DIR__ . '/..' . '/league/html-to-markdown/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'Parsedown' => 
            array (
                0 => __DIR__ . '/..' . '/erusev/parsedown',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6e75602423c8ccaa9d35409328c36b72::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6e75602423c8ccaa9d35409328c36b72::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit6e75602423c8ccaa9d35409328c36b72::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
