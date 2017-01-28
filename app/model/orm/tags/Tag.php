<?php

namespace OrmDemo;

use Nextras\Orm\Entity\Entity;
use Nextras\Orm\Relationships\ManyHasMany;


/**
 * Tag
 *
 * @property int                $id    {primary}
 * @property string             $name
 * @property ManyHasMany|Post[] $posts {m:m Post::$tags}
 */
class Tag extends Entity
{
}
