<?php

namespace OrmDemo;

use Nextras\Orm\Repository\Repository;


/**
 * @method Comment|NULL getById($id)
 */
class CommentsRepository extends Repository
{
	static function getEntityClassNames(): array
	{
		return [Comment::class];
	}
}
