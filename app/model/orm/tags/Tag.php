<?php

namespace OrmDemo;

use Nextras\Orm\Entity\Entity;


/**
 * Tag
 * @property string $name
 * @property Post[] $posts {m:n PostsRepository}
 */
class Tag extends Entity
{}
