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
	protected function setupLayout() {
		if (!is_null($this->layout)) {
			$this->layout = View::make($this->layout);
		}
		$currentMenu = 'current';
		$currentUser = Auth::user();
		$fontSize = '100%';
		if($currentUser) {
			if (strlen($currentUser->email) > 22 && strlen($currentUser->email) <= 24) $fontSize = '95%';
			if (strlen($currentUser->email) > 24 && strlen($currentUser->email) <= 26) $fontSize = '90%';
			if (strlen($currentUser->email) > 27 && strlen($currentUser->email) <= 29) $fontSize = '83%';
			if (strlen($currentUser->email) > 31 && strlen($currentUser->email) <= 32) $fontSize = '75%';
			if (strlen($currentUser->email) > 32 && strlen($currentUser->email) <= 34) $fontSize = '71%';
			if (strlen($currentUser->email) > 34) $fontSize = '60%';
		}


		$currentRoute = Route::currentRouteName();
		$products = new ProductRepository();
		$products = $products->getRandom();

		View::share(compact('currentUser', 'currentMenu', 'currentRoute', 'products', 'fontSize'));
	}

}
