<?php namespace Ooglee\Infrastructure\BreadCrumb;

use Illuminate\Contracts\View\Factory as ViewFactory;
use Ooglee\Infrastructure\BreadCrumb\Exception\BreadCrumbException;

class View {

	protected $factory;

	public function __construct(ViewFactory $factory)
	{
		$this->factory = $factory;
	}

	public function render($view, $breadcrumbs)
	{
		if (!$view)
		{
			throw new BreadCrumbException('Breadcrumbs view not specified (check the view in config/breadcrumbs.php, and ensure DaveJamesMiller\Breadcrumbs\ServiceProvider is loaded before any dependants in config/app.php)');
		}	

		return $this->factory->make($view, compact('breadcrumbs'))->render();
	}

}
