<?php declare(strict_types=1);

namespace OrmDemo\Presenters;

use Nette;


/**
 * Handles 4xx HTTP error responses.
 */
final class Error4xxPresenter extends Nette\Application\UI\Presenter
{
	// allow access via all HTTP methods
	/** @var list<string> */
	public array $allowedMethods = [];


	public function renderDefault(Nette\Application\BadRequestException $exception): void
	{
		// renders the appropriate error template based on the HTTP status code
		$code = $exception->getCode();
		$file = is_file($file = __DIR__ . "/templates/Error/$code.latte")
			? $file
			: __DIR__ . '/templates/Error/4xx.latte';
		assert($this->template instanceof Nette\Bridges\ApplicationLatte\Template);
		$this->template->httpCode = $code;
		$this->template->setFile($file);
	}
}
