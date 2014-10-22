<?php
namespace Codeception\Module;

use Laracasts\TestDummy\Factory as TestDummy;

class FunctionalHelper extends \Codeception\Module
{
	public function signIn(){

		$email = 'night@gmail.com';
		$password = '1234';
		$I = $this->getModule('Laravel4');
		$user = $this->haveAnAccount(compact('email', 'password'));

		$I->amOnPage('/');
		$I->see('Ingresar', 'li');
		$I->amOnPage('/login');
		$I->fillField('email', $email);
		$I->fillField('password', $password);
		$I->click('Ingresar');
		return $user;
	}

	public function registerProduct(){

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