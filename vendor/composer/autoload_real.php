<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitacc0b72b0ba791e25345ea419f9b879e
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInitacc0b72b0ba791e25345ea419f9b879e', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitacc0b72b0ba791e25345ea419f9b879e', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitacc0b72b0ba791e25345ea419f9b879e::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
