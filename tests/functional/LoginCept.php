<?php
$I = new FunctionalTester($scenario);
$I->am('un usuario de Grupo Dos');
$I->wantTo('ingresar a Grupo Dos');
//$I->click('Ingresar');
$username = 'nightzpy';
$email = 'nightzpy@gmail.com';
$password = '1234';
$user = $I->haveAnAccount(compact('username', 'email', 'password'));
$I->seeRecord('users', [
	'username' => $username,
	'email' => $email
]);

$I->amOnPage('/login');
$I->fillField('email', $email);
$I->fillField('password', $password);
$I->click('Ingresar');

$I->seeInCurrentUrl('/');
$I->dontSee('Registrarse', 'li');
$I->see($user->nombres);
$I->assertTrue(Auth::check());
