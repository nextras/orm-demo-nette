<?php

namespace OrmDemo;

use Nette\Utils\DateTime;
use Nextras\Orm\Entity\Entity;


/**
 * Post
 * @property string $title
 * @property string $content
 * @property DateTime $createdAt
 * @property Comment[] $comments {1:n CommentsRepository}
 * @property Tag[] $tags {m:n TagsRepository primary}
 */
class Post extends Entity
{
}
