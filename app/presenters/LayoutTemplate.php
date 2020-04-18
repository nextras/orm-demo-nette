<?php

namespace OrmDemo;

use Nette\Bridges\ApplicationLatte\Template;


class LayoutTemplate extends Template
{
	/** @var string */
	public $basePath;
	/** @var array */
	public $flashes;
}
