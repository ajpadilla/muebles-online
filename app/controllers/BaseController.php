<?php

use Muebles\Products\ProductRepository;

class BaseController extends Controller {

	/**
	 * @var ProductRepository
	 */
	private $repository;

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
		$currentMenu = 'current';
		$currentUser = Auth::user();
		$currentRoute = Request::url();
		$products = new ProductRepository();
		$products = $products->getRandom();

		View::share(compact('currentUser', 'currentMenu', 'currentRoute', 'products'));
	}

}
