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

	/** @var Post */
	private $post;


	public function renderDefault()
	{
		$this->template->posts = $this->orm->posts->findHomepageOverview();
	}


	public function actionDetail($id)
	{
		$post = $this->orm->posts->getById($id);
		if (!$post) $this->error();
		$this->post = $post;
	}


	public function renderDetail()
	{
		$this->template->post = $this->post;
	}

}
