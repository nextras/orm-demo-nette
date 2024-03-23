<?php declare(strict_types=1);

namespace OrmDemo\Blog\Model\Comments;

use DateTimeImmutable;
use Nextras\Orm\Entity\Entity;
use OrmDemo\Blog\Model\Posts\Post;


/**
 * Comment
 *
 * @property int                    $id        {primary}
 * @property string                 $name
 * @property string|null            $email
 * @property string                 $content
 * @property DateTimeImmutable      $createdAt {default now}
 * @property DateTimeImmutable|null $deletedAt
 * @property Post                   $post      {m:1 Post::$allComments}
 */
class Comment extends Entity
{
}
