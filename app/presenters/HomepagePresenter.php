<?php

namespace OrmDemo;

use Nette\Application\UI\Form;


class HomepagePresenter extends BasePresenter
{
	/** @var Orm @inject */
	public $orm;

	/** @var Post */
	private $post;


	public function renderDefault()
	{
		$template = $this->createTemplate(HomepageTemplate::class);
		$template->posts = $this->orm->posts->findHomepageOverview();
		$this->sendTemplate($template);
	}


	public function actionDetail(int $id)
	{
		$this->post = $this->orm->posts->getByIdChecked($id);
	}


	public function renderDetail()
	{
		$template = $this->createTemplate(HomepageDetailTemplate::class);
		$template->post = $this->post;
		$this->sendTemplate($template);
	}


	protected function createComponentAddCommentForm()
	{
		$form = new Form;
		$form->addText('name', 'Name')->setRequired();
		$form->addText('email', 'E-mail')->setHtmlType('email');
		$form->addTextArea('content', 'Comment');
		$form->addSubmit('submit', 'Add comment');

		$form->onSuccess[] = [$this, 'processAddCommentForm'];
		return $form;
	}


	public function processAddCommentForm(Form $form, $values)
	{
		$comment = new Comment();
		$comment->content = $values->content;
		$comment->name = $values->name;
		$comment->email = $values->email;
		$comment->post = $this->post;

		$this->orm->comments->persistAndFlush($comment);
		$this->redirect('this');
	}


	/**
	 * @secured
	 */
	public function handleDeleteComment(int $commentId)
	{
		$comment = $this->orm->comments->getByIdChecked($commentId);
		$comment->deletedAt = 'now';
		$this->orm->comments->persistAndFlush($comment);
		$this->redirect('this');
	}


	public function createComponentUpdateTagsForm()
	{
		if (!$this->post) {
			$this->error();
		}

		$form = new Form;
		$form->addCheckboxList('tags', 'Tags', $this->orm->tags->findAll()->fetchPairs('id', 'name'))
			->setDefaultValue($this->post->tags->getRawValue());

		$form->addSubmit('submit', 'Save tags');
		$form->onSuccess[] = [$this, 'processUpdateTagsForm'];
		return $form;
	}


	public function processUpdateTagsForm(Form $form, $values)
	{
		$this->post->tags->set($values->tags);
		$this->orm->posts->persistAndFlush($this->post);
		$this->redirect('this');
	}
}
