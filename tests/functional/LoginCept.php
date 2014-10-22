<?php
$I = new FunctionalTester($scenario);
$I->am('un usuario de Grupo Dos');
$I->wantTo('ingresar a Grupo Dos');
//$I->click('Ingresar');
$email = 'nightzpy@gmail.com';
$password = '1234';
$user = $I->haveAnAccount(compact('email', 'password'));
$I->seeRecord('users', [
	'email' => $email
]);

$I->amOnPage('/login');
$I->fillField('email', $email);
$I->fillField('password', $password);
$I->click('Ingresar');

$I->seeInCurrentUrl('/');
$I->dontSee('Registrarse', 'li');
$I->see($user->nombre);
$I->assertTrue(Auth::check());
