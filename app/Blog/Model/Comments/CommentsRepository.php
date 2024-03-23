<?php declare(strict_types=1);

namespace OrmDemo\Blog\Model\Comments;

use Nextras\Orm\Repository\Repository;


/**
 * @extends Repository<Comment>
 */
class CommentsRepository extends Repository
{
	static function getEntityClassNames(): array
	{
		return [Comment::class];
	}
}
