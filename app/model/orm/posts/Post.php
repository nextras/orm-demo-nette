<?php

namespace OrmDemo;

use Nette\Utils\DateTime;
use Nextras\Orm\Collection\ICollection;
use Nextras\Orm\Entity\Entity;
use Nextras\Orm\Relationships\ManyHasMany;
use Nextras\Orm\Relationships\OneHasMany;


/**
 * Post
 *
 * @property string                     $title
 * @property string                     $content
 * @property DateTime                   $createdAt    {default now}
 * @property OneHasMany|Comment[]       $allComments  {1:n Comment}
 * @property-read ICollection|Comment[] $comments     {virtual}
 * @property ManyHasMany|Tag[]          $tags         {m:n Tag primary}
 */
class Post extends Entity
{

	public function getterComments()
	{
		return $this->allComments->get()->findBy(['deletedAt' => NULL]);
	}

}
