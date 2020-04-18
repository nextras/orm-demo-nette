<?php

namespace OrmDemo;

use DateTimeImmutable;
use Nextras\Orm\Collection\ICollection;
use Nextras\Orm\Entity\Entity;
use Nextras\Orm\Relationships\ManyHasMany;
use Nextras\Orm\Relationships\OneHasMany;


/**
 * Post
 * @property int                        $id          {primary}
 * @property string                     $title
 * @property string                     $content
 * @property DateTimeImmutable          $createdAt   {default now}
 * @property OneHasMany|Comment[]       $allComments {1:m Comment::$post}
 * @property-read ICollection|Comment[] $comments    {virtual}
 * @property ManyHasMany|Tag[]          $tags        {m:m Tag::$posts, isMain=true}
 */
class Post extends Entity
{
	public function getterComments()
	{
		return $this->allComments->toCollection()->findBy(['deletedAt' => null]);
	}
}
