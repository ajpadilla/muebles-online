<?php namespace Muebles\Users\Events;
use Muebles\Users\User;

class UserRegistered {

	public $user;

	function __construct(User $user)
	{
		$this->user = $user;
	}
}