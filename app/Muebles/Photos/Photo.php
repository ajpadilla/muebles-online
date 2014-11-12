<?php namespace Muebles\Photos;


use Muebles\Core\Upload;
use Eloquent;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class Photo extends Eloquent {

	protected $softDelete = true;

	private $upload;

	public function product(){
		return $this->belongsTo('Muebles\Products\Product');
	}

	public function user()
	{
		return $this->belongsTo('Muebles\Products\User');
	}

	public function register(UploadedFile $file, $productId, $userId)
	{
		$this->upload = new Upload($file);
		$this->upload->process();
		$this->complete_path = $this->upload->getCompletePublicFilePath();
		$this->complete_thumbnail_path = $this->upload->getCompleteThumbnailPublicFilePath();
		$this->fileName = $this->upload->getFileName();
		$this->path = $this->upload->getUploadPath();
		$this->extension = $this->upload->getFileExtension();
		$this->size = $this->upload->getSize();
		$this->mimetype = $this->upload->getMimeType();
		$this->user_id = $userId;
		$this->product_id = $productId;
		$this->save();

	}

}