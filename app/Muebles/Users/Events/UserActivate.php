<?php namespace Muebles\Users\Events;
use Muebles\Users\User;

class UserActivate {

	public $user;

	function __construct(User $user)
	{
		$this->user = $user;
	}
}