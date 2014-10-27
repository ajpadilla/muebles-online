<?php
namespace Codeception\Module;

use Laracasts\TestDummy\Factory as TestDummy;

class FunctionalHelper extends \Codeception\Module
{
	public function signIn(){

		$username = 'nightzpy';
		$email = 'nightzpy@gmail.com';
		$password = '1234';
		$user = $this->haveAnAccount(compact('username', 'email', 'password'));

		$I = $this->getModule('Laravel4');

		$I->amOnPage('/login');
		$I->fillField('email', $email);
		$I->fillField('password', $password);
		$I->click('Ingresar');
		return $user;
	}

	public function have($model, $overrides = [])
	{
		return TestDummy::create($model, $overrides);
	}

	public function haveAnAccount($overrides = [])
	{
		return $this->have('Muebles\Users\User', $overrides);
	}
}