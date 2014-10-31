<?php namespace Muebles\Facturas;


class FacturasRepository {

	public function get($id){
		return Factura::findOrFail($id);
	}
}