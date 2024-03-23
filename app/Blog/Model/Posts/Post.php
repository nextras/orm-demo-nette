<?php declare(strict_types=1);

namespace OrmDemo\Blog\Model\Posts;

use DateTimeImmutable;
use Nextras\Orm\Collection\ICollection;
use Nextras\Orm\Entity\Entity;
use Nextras\Orm\Relationships\ManyHasMany;
use Nextras\Orm\Relationships\OneHasMany;
use OrmDemo\Blog\Model\Comments\Comment;
use OrmDemo\Blog\Model\Tags\Tag;


/**
 * Post
 *
 * @property int                        $id          {primary}
 * @property string                     $title
 * @property string                     $content
 * @property DateTimeImmutable          $createdAt   {default now}
 * @property OneHasMany<Comment>        $allComments {1:m Comment::$post}
 * @property ManyHasMany<Tag>           $tags        {m:m Tag::$posts, isMain=true}
 *
 * @property-read ICollection<Comment>  $comments    {virtual}
 */
class Post extends Entity
{
    public function __construct(string $title, string $content)
    {
        parent::__construct();
        $this->title = $title;
        $this->content = $content;
    }


    /**
     * @return ICollection<Comment>
     */
	public function getterComments(): ICollection
	{
		return $this->allComments->toCollection()->findBy(['deletedAt' => null]);
	}
}
