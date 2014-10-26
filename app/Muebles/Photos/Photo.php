<?php namespace Muebles\Photos;

use Andrew13\Cabinet\CabinetUpload;

class Photo extends CabinetUpload {

	protected $softDelete = true;

	public function product(){
		return $this->belongsTo('Muebles\Products\Product');
	}

}