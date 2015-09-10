<?php

require_once __DIR__ . '/../app/bootstrap.php';

$dic = $configurator->createContainer();
$conn = $dic->getByType('Nextras\Dbal\Connection');
$dbal = new Nextras\Migrations\Bridges\NextrasDbal\NextrasAdapter($conn);
$driver = new Nextras\Migrations\Drivers\MySqlDriver($dbal);

if (PHP_SAPI === 'cli') {
	$controller = new Nextras\Migrations\Controllers\ConsoleController($driver);
} else {
	$controller = new Nextras\Migrations\Controllers\HttpController($driver);
}

$controller->addGroup('structure',  __DIR__ . '/structure');
$controller->addGroup('test-data',  __DIR__ . '/test-data', ['structure']);
$controller->addExtension('sql', new Nextras\Migrations\Extensions\SqlHandler($driver));

$controller->run();
