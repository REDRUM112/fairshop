<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc25b309a5baa9519de89dc5ebc41c5f2
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Sample\\' => 7,
        ),
        'P' => 
        array (
            'PayPalHttp\\' => 11,
            'PayPalCheckoutSdk\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Sample\\' => 
        array (
            0 => __DIR__ . '/..' . '/paypal/paypal-checkout-sdk/samples',
        ),
        'PayPalHttp\\' => 
        array (
            0 => __DIR__ . '/..' . '/paypal/paypalhttp/lib/PayPalHttp',
        ),
        'PayPalCheckoutSdk\\' => 
        array (
            0 => __DIR__ . '/..' . '/paypal/paypal-checkout-sdk/lib/PayPalCheckoutSdk',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc25b309a5baa9519de89dc5ebc41c5f2::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc25b309a5baa9519de89dc5ebc41c5f2::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc25b309a5baa9519de89dc5ebc41c5f2::$classMap;

        }, null, ClassLoader::class);
    }
}