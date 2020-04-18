<?php

use Nette\Application\Application;


/** @var \Nette\DI\Container $container */
$container = require __DIR__ . '/../app/bootstrap.php';
$container->getByType(Application::class)->run();
