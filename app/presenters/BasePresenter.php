<?php

namespace OrmDemo;

use Nette;
use Nextras\Application\UI\SecuredLinksPresenterTrait;


/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends Nette\Application\UI\Presenter
{
	use SecuredLinksPresenterTrait;
}
