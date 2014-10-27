<?php namespace Muebles\Users; 

class ActivateUserCommand  {

	public $userId;

	/**
	 * @param $userId
	 */
	function __construct($userId)
	{
		$this->userId = $userId;
	}


} 