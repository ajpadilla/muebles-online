<?php namespace Larabook\Products; 

use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;
use Muebles\Producs\ProductRepository;

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
										$command->modelo, $command->medidas, $command->lacado,
										$command->precio_lacado, $command->pulimento, $command->precio_pulimento,
										$command->cantidad, $command->precio
									);
		$this->repository->save($product);
		//$this->dispatchEventsFor($product);
		return $product;
	}

}