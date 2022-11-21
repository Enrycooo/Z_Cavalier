<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitfc0e2afc17b96114b4b4658f129bd6e5
{
    public static $prefixLengthsPsr4 = array (
        'R' => 
        array (
            'RRule\\' => 6,
        ),
        'D' => 
        array (
            'Dcblogdev\\PdoWrapper\\' => 21,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'RRule\\' => 
        array (
            0 => __DIR__ . '/..' . '/rlanvin/php-rrule/src',
        ),
        'Dcblogdev\\PdoWrapper\\' => 
        array (
            0 => __DIR__ . '/..' . '/dcblogdev/pdo-wrapper/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitfc0e2afc17b96114b4b4658f129bd6e5::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitfc0e2afc17b96114b4b4658f129bd6e5::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitfc0e2afc17b96114b4b4658f129bd6e5::$classMap;

        }, null, ClassLoader::class);
    }
}
