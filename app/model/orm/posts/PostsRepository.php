<?php

namespace OrmDemo;

use Nextras\Orm\Entity\Collection\ICollection;
use Nextras\Orm\Repository\Repository;


class PostsRepository extends Repository
{

	public function findHomepageOverview()
	{
		return $this->findAll()->orderBy('createdAt', ICollection::DESC);
	}

}
