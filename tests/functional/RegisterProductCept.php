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
$I->see('Nuevo Producto');
$I->click('Nuevo Producto');
$I->seeCurrentUrlEquals('/catalogo/create');


$I->fillField('Código:', 'abc123');
$I->fillField('Nombre:', 'Mueble');
$I->fillField('Modelo:', 'Terso');
$I->fillField('Medidas:', '100x40x50');
$I->selectOption('Lacado:', '1');
$I->fillField('Precio del Lacado:', '200,00');
$I->fillField('Pulimento:', '1');
$I->fillField('Precio del Pulimento:', '300,00');
$I->fillField('Cantidad:', '10');
$I->fillField('Precio:', '500,00');
$I->click('Siguiente: Agregar fotos');

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

