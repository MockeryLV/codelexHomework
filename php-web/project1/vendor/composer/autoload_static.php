<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd8efdabdb1c0c27d1a1b6e1c69eeb99f
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Spatie\\CalendarLinks\\' => 21,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Spatie\\CalendarLinks\\' => 
        array (
            0 => __DIR__ . '/..' . '/spatie/calendar-links/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd8efdabdb1c0c27d1a1b6e1c69eeb99f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd8efdabdb1c0c27d1a1b6e1c69eeb99f::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
