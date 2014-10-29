<?php namespace Muebles\Products;


use Illuminate\Support\Facades\DB;
use Muebles\Products\Product;
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
		return Product::all();
	}

	public function getRandom($limit = 3){
		return Product::has('photos')
			->orderBy(DB::raw('RAND()'))
			->take($limit)
			->get();
	}
}