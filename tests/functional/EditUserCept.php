<?php 
$I = new FunctionalTester($scenario);
$I->am('admin');
$I->wantTo('editar mi perfil');

$user = $I->signIn();
$I->amOnPage('/users');
$I->see($user->email, 'td');
$I->see('Editar', 'td');
$I->click('Editar');
$I->seeCurrentUrlEquals('/users/' . $user->id . '/edit');
$I->fillField('Nombre:', 'Otro nombre');
$I->fillField('Dirección:', 'En algún lugar');
$I->selectOption('Activo:', 'Si');
$I->click('Actualizar');
$I->seeCurrentUrlEquals('/users');
/**
 * Esto es un flash message que aparecerá en la lista, solo tienese que enviar
 * el flash como yo lo hago cuando registro un usuario o hago logout de un usuario
 * o login, ya las vistas tienen la zona donde aparece el mensaje
 */
$I->see('Otro nombre ha sido actualizado con éxito!');
$I->see('Otro nombre', 'td');
$I->see('En algún lugar', 'td');


