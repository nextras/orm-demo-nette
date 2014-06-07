<?php

namespace OrmDemo;

use Nette\Utils\DateTime;
use Nextras\Orm\Entity\Collection\ICollection;
use Nextras\Orm\Entity\Entity;
use Nextras\Orm\Relationships\OneHasMany;


/**
 * Post
 * @property string $title
 * @property string $content
 * @property DateTime $createdAt
 * @property OneHasMany|Comment[] $allComments {1:n CommentsRepository}
 * @property-read Comment[] $comments {filteredRelationship $allComments}
 * @property Tag[] $tags {m:n TagsRepository primary}
 */
class Post extends Entity
{

	public function filterComments(ICollection $collection)
	{
		return $collection->findBy(['deletedAt' => NULL]);
	}

}
