<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit543ec89616131b6f7215d7f23d4f861b
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'MF\\' => 3,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'MF\\' => 
        array (
            0 => __DIR__ . '/..' . '/MF',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit543ec89616131b6f7215d7f23d4f861b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit543ec89616131b6f7215d7f23d4f861b::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
