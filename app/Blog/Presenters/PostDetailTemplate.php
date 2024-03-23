<?php declare(strict_types=1);

namespace OrmDemo\Blog\Presenters;


use OrmDemo\Blog\Model\Posts\Post;

class PostDetailTemplate extends LayoutTemplate
{
    public Post $post;
}
