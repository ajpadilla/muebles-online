<?php namespace Muebles\Products;

use Eloquent;

class Product extends Eloquent{
	protected $fillable = ['codigo', 'nombre', 'descripcion', 'modelo', 'medidas', 'lacado', 'precio_lacado', 'pulimento', 'precio_pulimento', 'cantidad', 'precio'];

	public static function register($codigo, $nombre, $descripcion, $modelo, $medidas, $lacado, $precio_lacado, $pulimento, $precio_pulimento, $cantidad, $precio){
		$product = new static(compact('codigo', 'nombre', 'descripcion', 'modelo', 'medidas', 'lacado', 'precio_lacado', 'pulimento', 'precio_pulimento', 'cantidad', 'precio'));
		//$product->raise(new UserRegistered($product));
		return $product;
	}
}