<?php 
$I = new FunctionalTester($scenario);
$I->am('guest');
$I->wantTo('Registrarme');

$I->amOnPage('/');
$I->see('Registrarse', 'li');
$I->click('Registrarse');
//$I->click('Registrarse', '#nav-wrap');
$I->seeCurrentUrlEquals('/register');

$username = 'jose';
$nombres = 'Jose Luis';
$email = 'jose@jose.com';
$ubicacion = 'España, Madrid, Por ahi, Call #10';

$I->fillField('Nombre de Usuario:', $username);
$I->fillField('Email:', $email);
$I->fillField('Contraseña:', '1234');
$I->fillField('Confirme su contraseña:', '1234');
$I->fillField('Nombres:', $nombres);
$I->fillField('Apellidos:', 'Lopéz Urbano');
$I->fillField('Código Postal:', '05555');
$I->fillField('Detalles de ubicación:', $ubicacion);
$I->fillField('Teléfono Móvil:', '21321312313');
$I->fillField('Télefono Fijo:', '45465465464');
$I->fillField('Fax:', '234234234');
$I->selectOption('Ciudades:', 'Madrid');
$I->click('Registrar');

$I->seeCurrentUrlEquals('/user-registered/' . $email .'/' . rawurlencode ($nombres));
//$I->see('Usuario Registrado', 'title');
$I->see('Hemos registrado sus datos', 'h1');
$I->see('Estimado ' . $nombres . ', debes esperar por aprobación para poder ingresar al sistema, un correo será enviado a ' . $email . ' cuando tu usuario sea activado.', 'p');

$I->seeRecord('users', [
	'username' => $username,
	'email' => $email,
	'nombres' => $nombres,
	'ubicacion' => $ubicacion
]);