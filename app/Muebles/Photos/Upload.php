<?php namespace Muebles\Photos;

use Andrew13\Cabinet\CabinetUpload;

class Upload extends CabinetUpload {

	protected $softDelete = true;

	protected $table = 'photos';
	public function product(){
		return $this->belongsTo('Muebles\Products\Product');
	}

}