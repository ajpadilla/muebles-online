<?php namespace Muebles\Facturas;

use Muebles\Facturas\Factura;

class FinishInvoiceCommand  {

	/**
	 * @var Factura
	 */
	public $factura;

	function __construct(Factura $factura)
	{
		$this->factura = $factura;
	}
	
} 