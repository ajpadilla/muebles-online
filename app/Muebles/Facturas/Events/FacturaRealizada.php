<?php namespace Muebles\Facturas\Events;

use Muebles\Facturas\Factura;

class FacturaRealizada {

	public $factura;

	/**
	 * @param Factura $factura
	 */
	function __construct(Factura $factura)
	{
		$this->factura = $factura;
	}
	
} 