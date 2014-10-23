<?php namespace Larabook\Products; 

class Product extends Eloquent{
	protected $fillable = [];

	public static function register($codigo, $nombre, $descripcion, $modelo, $medidas, $lacado, $precio_lacado, $pulimento, $precio_pulimento, $cantidad, $precio){
		$product = new static(compact('codigo', 'nombre', 'descripcion', 'modelo', 'medidas', 'lacado', 'precio_lacado', 'pulimento', 'precio_pulimento', 'cantidad', 'precio'));
		//$product->raise(new UserRegistered($product));
		return $product;
	}
}