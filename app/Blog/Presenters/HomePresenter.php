<?php declare(strict_types=1);

namespace OrmDemo\Blog\Presenters;

use Nette\Application\UI\Form;
use Nette\Application\UI\Presenter;
use Nette\DI\Attributes\Inject;
use Nette\Utils\ArrayHash;
use OrmDemo\Blog\Model\Comments\Comment;
use OrmDemo\Blog\Model\Posts\Post;
use OrmDemo\Model\Orm;


class HomePresenter extends Presenter
{
	#[Inject]
	public Orm $orm;

	private Post|null $post = null;


	public function renderDefault(): void
	{
		$template = $this->createTemplate(PostListTemplate::class);
		$template->posts = $this->orm->posts->findHomepageOverview();
		$this->sendTemplate($template);
	}


	public function actionDetail(int $id): void
	{
		$this->post = $this->orm->posts->getByIdChecked($id);
	}


	public function renderDetail(int $id): void
	{
		if (!$this->post) $this->error();

		$template = $this->createTemplate(PostDetailTemplate::class);
		$template->post = $this->post;
		$this->sendTemplate($template);
	}


	protected function createComponentAddCommentForm(): Form
	{
		$form = new Form;
		$form->addText('name', 'Name')->setRequired();
		$form->addText('email', 'E-mail')->setHtmlType('email');
		$form->addTextArea('content', 'Comment');
		$form->addSubmit('submit', 'Add comment');
		$form->onSuccess[] = $this->processAddCommentForm(...);
		return $form;
	}


	public function processAddCommentForm(Form $form, ArrayHash $values): void
	{
		if (!$this->post) $this->error();

		$comment = new Comment();
		$comment->content = $values->content;
		$comment->name = $values->name;
		$comment->email = $values->email;
		$comment->post = $this->post;

		$this->orm->comments->persistAndFlush($comment);
		$this->redirect('this');
	}


	public function handleDeleteComment(int $commentId): void
	{
		$comment = $this->orm->comments->getByIdChecked($commentId);
		$comment->deletedAt = 'now';
		$this->orm->comments->persistAndFlush($comment);
		$this->redirect('this');
	}


	public function createComponentUpdateTagsForm(): Form
	{
		if (!$this->post) $this->error();

		$form = new Form;
		$form->addCheckboxList('tags', 'Tags', $this->orm->tags->findAll()->fetchPairs('id', 'name'))
			->setDefaultValue($this->post->tags->getRawValue());

		$form->addSubmit('submit', 'Save tags');
		$form->onSuccess[] = $this->processUpdateTagsForm(...);
		return $form;
	}


	public function processUpdateTagsForm(Form $form, ArrayHash $values): void
	{
		if (!$this->post) $this->error();

		$this->post->tags->set($values->tags);
		$this->orm->posts->persistAndFlush($this->post);
		$this->redirect('this');
	}
}
