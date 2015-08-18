<?php

namespace OrmDemo;

use Nette\Utils\DateTime;
use Nextras\Orm\Entity\Entity;


/**
 * Comment
 *
 * @property string          $name
 * @property string|NULL     $email
 * @property string          $content
 * @property DateTime        $createdAt   {default now}
 * @property DateTime|NULL   $deletedAt
 * @property Post            $post        {m:1 Post::$allComments}
 */
class Comment extends Entity
{
}
