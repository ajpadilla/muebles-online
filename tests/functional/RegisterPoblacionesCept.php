<?php 
$I = new FunctionalTester($scenario);
$I->am('Un administrador');
$I->wantTo('Registrar una población');
$I->amOnPage('poblaciones/register');
$I->see('Registrar nueva población', 'h3');
$I->fillField('Nombre:', 'Madrid');
$I->click('Guardar');
$I->seeCurrentUrlEquals('/poblaciones');
$I->see('Madrid', 'td');
$I->seeRecord('poblaciones', [
	'nombre' => 'Madrid',
]);

$I->wantTo('Registrar una provincia');
$I->amOnPage('provincias/register');
$I->see('Registrar nueva provincia');
$I->fillField('Nombre:', 'Madrid');
$I->selectOption('Poblaciones:', 'Madrid');
$I->click('Guardar');
$I->seeCurrentUrlEquals('/provincias');
$I->see('Lista de poblaciones', 'h3');
$I->see('Madrid', 'td');
$I->seeRecord('provincias', [
	'nombre' => 'Madrid',
	'poblacion_id' => '1'
]);