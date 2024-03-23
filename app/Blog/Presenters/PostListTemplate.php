<?php declare(strict_types=1);

namespace OrmDemo\Blog\Presenters;

use Nextras\Orm\Collection\ICollection;
use OrmDemo\Blog\Model\Posts\Post;


class PostListTemplate extends LayoutTemplate
{
    /** @var ICollection<Post> */
    public ICollection $posts;
}
