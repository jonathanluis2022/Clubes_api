<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitacfd30d5f33e8cada5d73a4209b2286b
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitacfd30d5f33e8cada5d73a4209b2286b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitacfd30d5f33e8cada5d73a4209b2286b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitacfd30d5f33e8cada5d73a4209b2286b::$classMap;

        }, null, ClassLoader::class);
    }
}