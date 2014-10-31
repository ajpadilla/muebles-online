<?php namespace Muebles\Facturas;


class FacturasRepository {

	public function get($id){
		return Factura::findOrFail($id);
	}

	public function getStatus(Factura $factura)
	{
		return $factura->finished() ? 'Finalizada' : 'Sin Finalizar';
	}
}