<?php

namespace OrmDemo;

use Nette;


/**
 * Homepage presenter.
 */
class HomepagePresenter extends BasePresenter
{
	/** @var \OrmDemo\Orm @inject */
	public $orm;


	public function renderDefault()
	{
		$this->template->posts = $this->orm->posts->findHomepageOverview();
	}

}
