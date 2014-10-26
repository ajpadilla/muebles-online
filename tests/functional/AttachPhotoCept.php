<?php 
$I = new FunctionalTester($scenario);
$I->am('Administrador');
$I->wantTo('Registrar un nuevo producto con fotos');

$product = $I->registerProduct();

// Agrego las fotos
$I->amOnPage('/photos/create/' . $product->id);
$I->see('Adjuntar fotos al producto (' . $product->nombre . ')');
/*$I->attachFile('#addPhoto', 'frontal.jpg');
$I->click('Iniciar');

// Reviso si el producto aparece en la lista
$I->seeCurrentUrlEquals('/products');
$I->see($product->nombre, 'td');
$I->see($product->modelo, 'td');

// Reviso la base de datos para comprobar que existan
$I->seeRecord('photos', [
	'filename' => 'frontal.jpg',
	'extension' => 'jpg',
	'product_id' => $product->id
]);*/
