<?php namespace Muebles\Facturas; 

use Carbon\Carbon;
use Eloquent;
use Laracasts\Commander\Events\EventGenerator;

class Factura extends Eloquent{

	use EventGenerator;

	protected $fillable = [];

	public function pedidos(){
		return $this->hasMany('Muebles\Pedidos\Pedido');
	}

	public function client(){
		return $this->belongsTo('Muebles\Users\User', 'client_id');
	}

	public function getUpdatedAtAttribute($date) {
		return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d/m/Y - H:i:s');
	}

	public function finished(){
		return $this->finish;
	}
}