<?php 
$I = new FunctionalTester($scenario);
$I->signIn();
$products = [];
for ($i = 0; $i < 30; $i++)
	$products[] = $I->registerProduct();

$I->am('Any User');
$I->wantTo('Ver la lista de productos');
$I->amOnPage('/products');
$I->see('Catálogo');

foreach ($products as $product) {
	$I->see($product->nombre, 'td');
	$I->see($product->modelo, 'td');
}





