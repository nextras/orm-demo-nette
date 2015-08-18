<?php

namespace OrmDemo;

use Nextras\Orm\Entity\Entity;
use Nextras\Orm\Relationships\ManyHasMany;


/**
 * Tag
 *
 * @property string              $name
 * @property ManyHasMany|Post[]  $posts   {m:n Post}
 */
class Tag extends Entity
{
}
