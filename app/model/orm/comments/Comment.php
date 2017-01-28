<?php

namespace OrmDemo;

use DateTimeImmutable;
use Nextras\Orm\Entity\Entity;


/**
 * Comment
 *
 * @property int             $id {primary}
 * @property string          $name
 * @property string|NULL     $email
 * @property string          $content
 * @property Post            $post {m:1 Post::$allComments}
 * @property DateTimeImmutable      $createdAt {default now}
 * @property DateTimeImmutable|NULL $deletedAt
 */
class Comment extends Entity
{
}
