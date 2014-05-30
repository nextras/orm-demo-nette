<?php

namespace OrmDemo;

use Nextras\Orm\Model\DIModel;


/**
 * Model
 * @property-read TagsRepository $tags
 * @property-read CommentsRepository $comments
 * @property-read PostsRepository $posts
 */
class Orm extends DIModel
{
}
