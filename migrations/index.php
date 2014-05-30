<?php

require_once __DIR__ . '/../app/bootstrap.php';

$dic = $configurator->createContainer();
$context = $dic->getByType('Nette\Database\Context');
$driver = new Nextras\Migrations\Drivers\MySqlNetteDbDriver($context, 'migrations');

if (PHP_SAPI === 'cli') {
	$controller = new Nextras\Migrations\Controllers\ConsoleController($driver);
} else {
	$controller = new Nextras\Migrations\Controllers\HttpController($driver);
}

$controller->addGroup('structure',  __DIR__ . '/structure');
$controller->addGroup('test-data',  __DIR__ . '/test-data', ['structure']);
$controller->addExtension('sql', new Nextras\Migrations\Extensions\NetteDbSql($context));

$controller->run();
