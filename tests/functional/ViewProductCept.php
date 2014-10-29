<?php 
$I = new FunctionalTester($scenario);
$user = $I->signIn();
$I->am($user->nombre);
$I->wantTo('ver un producto');
$product = $I->registerProduct();
$I->amOnPage('/products/' . $product->id);
$I->see('Detalles de ' . $product->nombre, 'h1');
$I->see('Código: ', $product->codigo);
$I->click('Lista de productos');
$I->seeCurrentUrlEquals('/products');