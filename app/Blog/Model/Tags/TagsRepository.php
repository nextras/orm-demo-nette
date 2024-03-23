<?php declare(strict_types=1);

namespace OrmDemo\Blog\Model\Tags;

use Nextras\Orm\Repository\Repository;


/**
 * @extends Repository<Tag>
 */
class TagsRepository extends Repository
{
	static function getEntityClassNames(): array
	{
		return [Tag::class];
	}
}
