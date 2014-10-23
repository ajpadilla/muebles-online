<?php namespace Muebles\Producs;


use Larabook\Products\Product;
use Laracasts\Commander\Events\EventGenerator;
use Muebles\Users\Events\UserActivate;

class ProductRepository {

	use EventGenerator;

	/**
	 * Persist a user.
	 *
	 * @param Product $product
	 * @return mixed
	 */
	public function save(Product $product){
		return $product->save();
	}

	/**
	 * Get all products
	 */
	public function getAll(){
		retur Product::all();
	}
} 