<?php
$email = 'nightzpy@gmail.com';
$password = '1234';

$I = new FunctionalTester($scenario);
$I->am('Administrador');
$I->wantTo('Registrar un nuevo producto');

// Me loggeo con el usuario
$I->signIn();

// Registro un producto
$I->amOnPage('/');
$I->see('Catálogo', 'li');
$I->click('Catálogo');
$I->seeCurrentUrlEquals('/catalogo');
$I->see('Nuevo');
$I->click('Nuevo');
$I->seeCurrentUrlEquals('catalogo/register');


$I->fillField('Código', 'abc123');
$I->fillField('Nombre:', 'Mueble');
$I->fillField('Modelo:', 'Terso');
$I->fillField('Medidas:', '100x40x50');
$I->selectOption('Lacado:', 'Si');
$I->fillField('Precio Lacado:', '200');
$I->fillField('Pulimento:', 'Si');
$I->fillField('Precio Pulimento:', '300');
$I->fillField('Cantidad:', '10');
$I->fillField('Precio:', '500.00');
$I->click('Registrar');

// Reviso si el producto aparece en la lista
$I->seeCurrentUrlEquals('productos');
$I->see('Mueble', 'td');
$I->see('Terso', 'td');

// Reviso en la base de datos

$I->seeRecord('muebles', [
	'codigo' => 'abc123',
	'nombre' => 'Mueble',
	'modelo' => 'Terso'
]);

