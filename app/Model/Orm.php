<?php declare(strict_types=1);

namespace OrmDemo\Model;

use Nextras\Orm\Model\Model;
use OrmDemo\Blog\Model\Comments\CommentsRepository;
use OrmDemo\Blog\Model\Posts\PostsRepository;
use OrmDemo\Blog\Model\Tags\TagsRepository;


/**
 * Model
 *
 * @property-read TagsRepository      $tags
 * @property-read CommentsRepository  $comments
 * @property-read PostsRepository     $posts
 */
class Orm extends Model
{
}
