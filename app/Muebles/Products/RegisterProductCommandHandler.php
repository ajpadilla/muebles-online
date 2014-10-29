<?php namespace Muebles\Products;

use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;
use Muebles\Products\ProductRepository;
use Muebles\Products\Product;

class RegisterProductCommandHandler implements CommandHandler {

	use DispatchableTrait;

	/**
	 * @var Repository
	 */
	protected $repository;

	/**
	 * @param ProductRepository $repository
	 */
	function __construct(ProductRepository $repository)
	{
		$this->repository = $repository;
	}


	/**
	 * Handle the command
	 *
	 * @param $command
	 * @return mixed
	 */
	public function handle($command)
	{
		$product = Product::register(
										$command->codigo, $command->nombre, $command->descripcion,
										$command->medidas, $command->precio_lacado, $command->precio_lacado_puntos,
										$command->precio_pulimento, $command->precio_pulimento_puntos,
										$command->cantidad
									);
		$this->repository->save($product);
		//$this->dispatchEventsFor($product);
		return $product;
	}

}