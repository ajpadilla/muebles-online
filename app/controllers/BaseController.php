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
		$nombre = str_word_count($currentUser->nombre, 1, 'áéíóú')[0];
		if($currentUser) {
			if (strlen($nombre) > 22 && strlen($nombre) <= 24) $fontSize = '95%';
			if (strlen($nombre) > 24 && strlen($nombre) <= 26) $fontSize = '90%';
			if (strlen($nombre) > 27 && strlen($nombre) <= 29) $fontSize = '83%';
			if (strlen($nombre) > 31 && strlen($nombre) <= 32) $fontSize = '75%';
			if (strlen($nombre) > 32 && strlen($nombre) <= 34) $fontSize = '71%';
			if (strlen($nombre) > 34) $fontSize = '60%';
		}


		$currentRoute = Route::currentRouteName();
		$products = new ProductRepository();
		$products = $products->getRandom();

		View::share(compact('currentUser', 'currentMenu', 'currentRoute', 'products', 'fontSize', 'nombre'));
	}

}
