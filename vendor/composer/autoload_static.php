<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5e0fda8d44fa5d5dd1de8ba5eda9e745
{
    public static $prefixLengthsPsr4 = array (
        'V' => 
        array (
            'VariableAnalysis\\' => 17,
        ),
        'N' => 
        array (
            'NeutronStandard\\' => 16,
        ),
        'D' => 
        array (
            'Dealerdirect\\Composer\\Plugin\\Installers\\PHPCodeSniffer\\' => 55,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'VariableAnalysis\\' => 
        array (
            0 => __DIR__ . '/..' . '/sirbrillig/phpcs-variable-analysis/VariableAnalysis',
        ),
        'NeutronStandard\\' => 
        array (
            0 => __DIR__ . '/..' . '/automattic/phpcs-neutron-standard/NeutronStandard',
        ),
        'Dealerdirect\\Composer\\Plugin\\Installers\\PHPCodeSniffer\\' => 
        array (
            0 => __DIR__ . '/..' . '/dealerdirect/phpcodesniffer-composer-installer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5e0fda8d44fa5d5dd1de8ba5eda9e745::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5e0fda8d44fa5d5dd1de8ba5eda9e745::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit5e0fda8d44fa5d5dd1de8ba5eda9e745::$classMap;

        }, null, ClassLoader::class);
    }
}
