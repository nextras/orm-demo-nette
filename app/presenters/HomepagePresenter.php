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


	protected function createComponentAddCommentForm()
	{
		$form = new Nette\Application\UI\Form;
		$form->addText('name', 'Jméno')->isRequired();
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

}
