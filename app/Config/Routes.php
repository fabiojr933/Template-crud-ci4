<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->get('/', 'Inicio::index');

$routes->get('/inicio', 'Inicio::index');

$routes->get('/receita', 'Receita::index');
$routes->get('/receita/novo', 'Receita::novo');
$routes->get('/receita/editar/(:num)', 'Receita::editar/$1');
$routes->post('/receita/store', 'Receita::store');
$routes->post('/receita/excluir', 'Receita::excluir');
$routes->get('/receita/visualizar/(:num)', 'Receita::visualizar/$1');;


$routes->get('/login', 'Usuario::index');
$routes->get('/registrar', 'usuario::registrar');
$routes->post('/usuario/autenticar', 'usuario::autenticar');
$routes->post('/usuario/store', 'usuario::store');
$routes->post('/usuario/mudarSenha', 'usuario::mudarSenha');
$routes->get('/usuario/sair', 'usuario::sair');
$routes->get('/usuario/trocar_senha', 'usuario::trocaSenha');
