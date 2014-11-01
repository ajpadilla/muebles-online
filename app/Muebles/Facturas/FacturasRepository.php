<?php namespace Muebles\Facturas;


class FacturasRepository {

	public function get($id){
		return Factura::findOrFail($id);
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