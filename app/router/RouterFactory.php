<?php

namespace OrmDemo;

use Nette\Application\Routers\Route;
use Nette\Application\Routers\RouteList;
use Nette\Routing\Router;


class RouterFactory
{
	public function createRouter(): Router
	{
		$router = new RouteList();
		$router[] = new Route('<presenter>/<action>[/<id>]', 'Homepage:default');
		return $router;
	}
}
