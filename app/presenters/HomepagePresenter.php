<?php

namespace OrmDemo;

use Nette;
use Nextras\Orm\Entity\IEntity;


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


	protected function createComponentAddCommentForm()
	{
		$form = new Nette\Application\UI\Form;
		$form->addText('name', 'Jméno')->setRequired();
		$form->addText('email', 'E-mail')->setType('email');
		$form->addTextArea('content', 'Komentář');
		$form->addSubmit('submit', 'Přidat komentář');

		$form->onSuccess[] = [$this, 'processAddCommentForm'];
		return $form;
	}


	public function processAddCommentForm(Nette\Application\UI\Form $form, $values)
	{
		$comment = new Comment();
		$comment->content = $values->content;
		$comment->name = $values->name;
		$comment->email = $values->email;
		$comment->post = $this->post;
		$comment->createdAt = 'now';

		$this->orm->comments->persistAndFlush($comment);
		$this->redirect('this');
	}


	/**
	 * @secured
	 */
	public function handleDeleteComment($commentId)
	{
		/** @var Comment $comment */
		$comment = $this->orm->comments->getById($commentId);
		if (!$comment) $this->error();

		$comment->deletedAt = 'now';
		$this->orm->comments->persistAndFlush($comment);
		$this->redirect('this');
	}


	public function createComponentUpdateTagsForm()
	{
		if (!$this->post) $this->error();

		$form = new Nette\Application\UI\Form;
		$form->addCheckboxList('tags', 'Tags', $this->orm->tags->findAll()->fetchPairs('id', 'name'))
			->setDefaultValue($this->post->tags->getRawValue());

		$form->addSubmit('submit', 'Ulozit nove stitky');
		$form->onSuccess[] = [$this, 'processUpdateTagsForm'];
		return $form;
	}


	public function processUpdateTagsForm(Nette\Application\UI\Form $form, $values)
	{
		$this->post->tags->set($values->tags);
		$this->orm->posts->persistAndFlush($this->post);
		$this->redirect('this');
	}

}
