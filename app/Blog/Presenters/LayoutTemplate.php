<?php declare(strict_types=1);

namespace OrmDemo\Blog\Presenters;

use Nette\Bridges\ApplicationLatte\Template;


abstract class LayoutTemplate extends Template
{
	public string $basePath;
	/** @var list<\stdClass> */
	public array $flashes;
}
