<?php declare(strict_types=1);

namespace OrmDemo\Blog\Model\Posts;

use Nextras\Orm\Collection\ICollection;
use Nextras\Orm\Repository\Repository;


/**
 * @extends Repository<Post>
 */
class PostsRepository extends Repository
{
    /**
     * @return ICollection<Post>
     */
	public function findHomepageOverview(): ICollection
	{
		return $this->findAll()->orderBy('createdAt', ICollection::DESC);
	}


	static function getEntityClassNames(): array
	{
		return [Post::class];
	}
}
