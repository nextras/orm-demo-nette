<?php

namespace OrmDemo;

use Nextras\Orm\Collection\ICollection;
use Nextras\Orm\Repository\Repository;


/**
 * @method Post|NULL getById($id)
 */
class PostsRepository extends Repository
{
	public function findHomepageOverview()
	{
		return $this->findAll()->orderBy('createdAt', ICollection::DESC);
	}


	static function getEntityClassNames(): array
	{
		return [Post::class];
	}
}
