<?php namespace Muebles\Facturas;


use Illuminate\Support\Facades\Auth;

class FacturasRepository {

	public function get($id){
		$user = Auth::user();
		if($user->isClient())
			$factura = $user->facturas()->findOrFail($id);
		else
			$factura = Factura::findOrFail($id);

		return $factura;
	}

	public function getStatus(Factura $factura)
	{
		return $factura->finished() ? 'Finalizada' : 'Sin Finalizar';
	}

	public function getAll(){
		return Factura::all();
	}

	public function invoicesForCustomer($clientId)
	{
		return Factura::select()->where('client_id', '=' , $clientId)->get();
	}
}