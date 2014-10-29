<?php namespace Muebles\Products;

use Eloquent;

class Product extends Eloquent {
	protected $fillable = ['codigo', 'nombre', 'descripcion', 'medidas', 'precio_lacado', 'precio_lacado_puntos', 'precio_pulimento', 'precio_pulimento_puntos', 'cantidad', 'precio'];

	public function photos()
	{
		return $this->hasMany('Muebles\Photos\Photo');
	}

	public static function register($codigo, $nombre, $descripcion, $medidas, $precio_lacado, $precio_lacado_puntos, $precio_pulimento, $precio_pulimento_puntos, $cantidad, $precio)
	{

		$product = new static(compact('codigo', 'nombre', 'descripcion', 'medidas', 'precio_lacado', 'precio_lacado_puntos', 'precio_pulimento', 'precio_pulimento_puntos', 'cantidad', 'precio'));
		//$product->raise(new UserRegistered($product));
		return $product;
	}

	public function hasPhotos(){
		return $this->photos->count();
	}

	public function getFirstPhoto(){
		if($this->hasPhotos())
			foreach ($this->photos as $photo)
				return $photo;
		return false;
	}

	// Accessors
	public function getPrecioAttribute($value){
		return number_format($value, 2, ',', '.');
	}

	public function getPrecioLacadoAttribute($value){
		return number_format($value, 2, ',', '.');
	}

	public function getPrecioPulimentoAttribute($value){
		return number_format($value, 2, ',', '.');
	}

	public function getPrecioLacadoPuntosAttribute($value){
		return number_format($value, 2, ',', '.');
	}

	public function getPrecioPulimentoPuntosAttribute($value){
		return number_format($value, 2, ',', '.');
	}

	// Override methods
	public function delete()
	{
		// delete all related photos
		$this->photos()->delete();
		// as suggested by Dirk in comment,
		// it's an uglier alternative, but faster
		// Photo::where("user_id", $this->id)->delete()

		// delete the user
		return parent::delete();
	}
}