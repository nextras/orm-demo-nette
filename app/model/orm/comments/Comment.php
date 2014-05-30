<?php

namespace OrmDemo;

use Nette\Utils\DateTime;
use Nextras\Orm\Entity\Entity;


/**
 * Comment
 * @property string $name
 * @property string|NULL $email
 * @property string $content
 * @property DateTime $createdAt
 * @property Post $post {m:1 PostsRepository}
 */
class Comment extends Entity
{
}
