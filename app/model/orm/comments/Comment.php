<?php

namespace OrmDemo;

use DateTimeImmutable;
use Nextras\Orm\Entity\Entity;


/**
 * Comment
 *
 * @property int                    $id        {primary}
 * @property string                 $name
 * @property string|NULL            $email
 * @property string                 $content
 * @property DateTimeImmutable      $createdAt {default now}
 * @property DateTimeImmutable|NULL $deletedAt
 * @property Post                   $post      {m:1 Post::$allComments}
 */
class Comment extends Entity
{
}
