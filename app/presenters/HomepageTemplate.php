<?php

namespace OrmDemo;

use Nextras\Orm\Collection\ICollection;


class HomepageTemplate extends LayoutTemplate
{
	/** @var ICollection|Post[] */
	public $posts;
}
