<?php declare(strict_types=1);

namespace OrmDemo\Blog\Model\Tags;

use Nextras\Orm\Entity\Entity;
use Nextras\Orm\Relationships\ManyHasMany;
use OrmDemo\Blog\Model\Posts\Post;


/**
 * Tag
 *
 * @property int $id    {primary}
 * @property string $name
 * @property ManyHasMany<Post> $posts {m:m Post::$tags}
 */
class Tag extends Entity
{
    public function __construct(string $name)
    {
        parent::__construct();
        $this->name = $name;
    }
}
