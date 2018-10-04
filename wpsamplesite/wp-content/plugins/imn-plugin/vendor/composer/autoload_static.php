<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit26629faf937ed491555d7f21aff4835a
{
    public static $prefixLengthsPsr4 = array (
        'I' => 
        array (
            'Imn_Inc\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Imn_Inc\\' => 
        array (
            0 => __DIR__ . '/../..' . '/inc',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit26629faf937ed491555d7f21aff4835a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit26629faf937ed491555d7f21aff4835a::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
