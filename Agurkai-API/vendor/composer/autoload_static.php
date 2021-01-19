<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita589004975e73c32951af4fa53be277b
{
    public static $prefixLengthsPsr4 = array (
        'V' => 
        array (
            'Veggies\\' => 8,
        ),
        'T' => 
        array (
            'Tomato\\' => 7,
        ),
        'M' => 
        array (
            'Main\\' => 5,
        ),
        'C' => 
        array (
            'Cucumber\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Veggies\\' => 
        array (
            0 => __DIR__ . '/../..' . '/class',
        ),
        'Tomato\\' => 
        array (
            0 => __DIR__ . '/../..' . '/class',
        ),
        'Main\\' => 
        array (
            0 => __DIR__ . '/../..' . '/class',
        ),
        'Cucumber\\' => 
        array (
            0 => __DIR__ . '/../..' . '/class',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita589004975e73c32951af4fa53be277b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita589004975e73c32951af4fa53be277b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInita589004975e73c32951af4fa53be277b::$classMap;

        }, null, ClassLoader::class);
    }
}
