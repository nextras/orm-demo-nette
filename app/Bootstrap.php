<?php declare(strict_types=1);

namespace OrmDemo;

use Nette\Bootstrap\Configurator;


class Bootstrap
{
    public static function boot(): Configurator
    {
        $configurator = new Configurator;
        $appDir = dirname(__DIR__);

        $configurator->setDebugMode(['127.0.0.1']);
        $configurator->enableTracy($appDir . '/log');
        $configurator->setTempDirectory($appDir . '/temp');
        $configurator->createRobotLoader()->addDirectory(__DIR__)->register();

        $configurator->addConfig($appDir . '/config/common.neon');
        $configurator->addConfig($appDir . '/config/services.neon');
        $configurator->addConfig($appDir . '/config/db.neon');
        $configurator->addConfig($appDir . '/config/db.local.neon');

        return $configurator;
    }
}
